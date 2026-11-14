<?php

namespace ModulesGarden\Servers\TSSPlugin\app\controllers\server\clientarea;

use ModulesGarden\Servers\TSSPlugin\app\models\whmcs\Client;
use ModulesGarden\Servers\TSSPlugin\app\models\whmcs\Order;
use ModulesGarden\Servers\TSSPlugin\app\models\whmcs\Product;
use ModulesGarden\Servers\TSSPlugin\app\models\whmcs\Service;
use ModulesGarden\Servers\TSSPlugin\app\models\whmcs\SSL;
use ModulesGarden\Servers\TSSPlugin\app\repository\whmcs\Config;
use ModulesGarden\Servers\TSSPlugin\app\repository\whmcs\Domain;
use ModulesGarden\Servers\TSSPlugin\app\repository\whmcs\ProductConfigOptions;
use ModulesGarden\Servers\TSSPlugin\app\services\InvoiceRenew;
use ModulesGarden\Servers\TSSPlugin\app\services\SSLStepThree;
use ModulesGarden\Servers\TSSPlugin\core\Lang;
use ModulesGarden\Servers\TSSPlugin\core\process\AbstractController;
use ModulesGarden\Servers\TSSPlugin\Server;
use ModulesGarden\TSSPlugin\App\Helpers\EmailTemplates;
use ModulesGarden\TSSPlugin\App\Libs\AcmeHelpers;
use ModulesGarden\TSSPlugin\App\Libs\AisHelpers;
use ModulesGarden\TSSPlugin\App\Libs\AutoInstallHelpers;
use ModulesGarden\TSSPlugin\App\Libs\CertificateBundle;
use ModulesGarden\TSSPlugin\App\Libs\CertificateService;
use ModulesGarden\TSSPlugin\App\Libs\CertificateSyncHelpers;
use ModulesGarden\TSSPlugin\App\Libs\Cpanel;
use ModulesGarden\TSSPlugin\App\Libs\GeneralSettings;
use ModulesGarden\TSSPlugin\App\Libs\ProductSettings;
use ModulesGarden\TSSPlugin\App\Libs\SmimeService;
use ModulesGarden\TSSPlugin\App\Libs\CodeSigningService;
use ModulesGarden\TSSPlugin\App\Libs\SslProductHelpers;
use ModulesGarden\TSSPlugin\App\Libs\Helpers;
use ModulesGarden\TSSPlugin\App\Libs\SSLTrustCenterApi;
use ModulesGarden\TSSPlugin\App\Models\AcmeSubscription;
use ModulesGarden\TSSPlugin\App\Models\AcmeSubscriptionDomain;
use ModulesGarden\TSSPlugin\App\Models\AisSubscription;
use ModulesGarden\TSSPlugin\App\Models\RemoteProduct;
use ModulesGarden\TSSPlugin\App\Models\Request;
use ModulesGarden\TSSPlugin\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\TSSPlugin\App\Repositories\Whmcs\ProductRepository;
use ModulesGarden\TSSPlugin\Core\WHMCS\Helper;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Invoice;
use WHMCS\Billing\Tax;
use WHMCS\Database\Capsule;

class home extends AbstractController
{
    // the pages and actions by product type
    use parts\SslCertificatePages;
    use parts\AcmeActions;
    use parts\CodeSigningActions;
    use parts\CodeGuardActions;
    use parts\DocumentSigningActions;
    use parts\GatewayRenewalActions;
    use parts\SmimeActions;
    use parts\AisActions;
    use parts\SslConfigurationActions;


    function indexHTML($input, $vars = [])
    {
        $vars['csrfToken'] = \generate_token('plain');

        try
        {
            $serviceId = $input['id'];
            $ssl       = SSL::getByServiceId($serviceId);

            $service = \WHMCS\Service\Service::find($serviceId);

            if(SmimeService::isSmimeWhmcsProduct($service->packageid))
            {
                return $this->indexSmimeHTML($input, $vars);
            }

            if(CodeSigningService::isCodeSigningWhmcsProduct($service->packageid))
            {
                return $this->indexCodeSigningHTML($input, $vars);
            }

            if(\ModulesGarden\TSSPlugin\App\Libs\CodeGuardService::isCodeGuardWhmcsProduct($service->packageid))
            {
                return $this->indexCodeGuardHTML($input, $vars);
            }

            if(\ModulesGarden\TSSPlugin\App\Libs\DocumentSigningService::isDocumentSigningWhmcsProduct($service->packageid))
            {
                return $this->indexDocumentSigningHTML($input, $vars);
            }

            if(AisHelpers::isAisWhmcsProduct($service->packageid))
            {
                if(isset($_GET['aisconfig']) && (string)$_GET['aisconfig'] === '1')
                {
                    return $this->aisConfigurationHTML($input, $vars);
                }
                return $this->indexAisHTML($input, $vars);
            }

            if(AcmeHelpers::isAcmeWhmcsProduct($service->packageid))
            {
                if(isset($_GET['acmeconfig']) && (string)$_GET['acmeconfig'] === '1')
                {
                    return $this->acmeConfigurationHTML($input, $vars);
                }
                return $this->indexAcmeHTML($input, $vars);
            }

            if(isset($ssl->status) && $ssl->status == 'Awaiting Configuration')
            {
                if(isset($_GET['configssl']) && (string)$_GET['configssl'] === '1')
                {
                    return $this->sslConfigurationHTML($input, $vars);
                }
                return $this->awaitingConfiguration($serviceId, $ssl);
            }

            if(isset($ssl->status) && $ssl->status == 'Configuration Submitted')
            {
                return $this->configurationSubmitted($input, $ssl);
            }

        }
        catch(\Exception $e)
        {

            return ['tpl' => 'error', 'vars' => ['error' => $e->getMessage()]];

        }

        return ['tpl' => 'home', 'vars' => $vars];

    }


    /**
     * State-changing client actions must be POSTed with the WHMCS CSRF token - WHMCS itself verifies the token
     * only on its own forms, so module actions reachable via GET would otherwise be open to CSRF.
     */
    /**
     * Actions that order at the vendor: only for the product type they belong to, an active (paid) service, and one
     * request at a time (a double click must not order twice)
     */
    private function requireOrderableService($input, $rightProduct)
    {
        if(!$rightProduct || ($input['params']['status'] ?? '') !== 'Active')
        {
            throw new \Exception(Lang::absoluteT('smimeServiceNotActive'));
        }
        if(!$this->acquireServiceLock((int)$input['id']))
        {
            throw new \Exception(Lang::absoluteT('requestInProgress'));
        }
    }

    private function requireCsrfToken()
    {
        if($_SERVER['REQUEST_METHOD'] !== 'POST' || !\ModulesGarden\TSSPlugin\App\Libs\CsrfToken::valid($_POST['token'] ?? ''))
        {
            throw new \Exception(Lang::absoluteT('invalidCsrfToken'));
        }
    }

    /**
     * Per-service MySQL lock so a double submit cannot place two orders / create two subscriptions.
     * Returns false when another request holds the lock.
     */
    private function acquireServiceLock($serviceId)
    {
        $row = Capsule::select('SELECT GET_LOCK(?, 0) AS l', ['tss_service_' . (int)$serviceId]);

        return !empty($row) && (int)$row[0]->l === 1;
    }

    private function releaseServiceLock($serviceId)
    {
        Capsule::select('SELECT RELEASE_LOCK(?)', ['tss_service_' . (int)$serviceId]);
    }

    private function extractDomainsFromInput($domains)
    {
        $items = preg_split('/[\s,;]+/', trim((string)$domains));
        $items = array_filter(array_map('trim', $items));
        $items = array_values(array_unique(array_map('strtolower', $items)));

        return $items;
    }
}
