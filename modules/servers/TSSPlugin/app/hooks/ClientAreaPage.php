<?php

namespace TSSPlugin\Server\app\hooks;


/**
 * WHMCS hook ClientAreaPage (registered in hooks.php).
 */
class ClientAreaPage
{
    public static function handle($params)
    {
        $page = basename($_SERVER['PHP_SELF']);

        // a product addon's certificate is free: an upgrade or more SANs would bypass the addon's billing (M-14)
        if($page == 'upgrade.php' && !empty($_GET['id']) && class_exists('\TSSPlugin\App\Libs\Certificates\AddonCertificates')
            && \TSSPlugin\App\Libs\Certificates\AddonCertificates::isCertificateService((int)$_GET['id']))
        {
            header('Location: clientarea.php?action=productdetails&id=' . (int)$_GET['id']);
            exit;
        }

        if($page == 'upgrade.php' && isset($_GET['type']) && $_GET['type'] == 'configoptions')
        {
            $serviceId = (int)$_GET['id'];
            $service   = \TSSPlugin\App\Models\Whmcs\Service::find($serviceId);

            if(!$service || $service->product->servertype != 'TSSPlugin')
            {
                return [];
            }

            if(\TSSPlugin\App\Libs\Subscriptions\AcmeHelpers::isAcmeWhmcsProduct($service->product->id))
            {
                header('Location: clientarea.php?action=productdetails&id=' . $serviceId);
                exit;
            }

            // a certificate bought at payment is bought with its number of SANs: more can be added once it is enrolled
            // (its details submitted), not while it waits for them
            $notEnrolled = \TSSPlugin\App\Libs\Certificates\IncompleteOrder::pending($serviceId)
                ? \TSSPlugin\App\Libs\Support\ClientText::get('sanUpgradeNotEnrolled', 'Additional domains can be added after the certificate details are submitted.')
                : '';

            // SANs of an ordered certificate can only be added; the main domain type of a FLEX certificate is fixed
            if(isset($_POST['step']) && $_POST['step'] == '2' && isset($_POST['configoption']) && is_array($_POST['configoption']))
            {
                $error = $notEnrolled !== '' ? $notEnrolled : \TSSPlugin\App\Libs\Billing\SanUpgrade::downgradeError($serviceId, $_POST['configoption']);
                if($error === '')
                {
                    $error = \TSSPlugin\App\Libs\Certificates\MainDomain::changeError((int)$serviceId, $_POST['configoption']);
                }
                if($error !== '')
                {
                    $_SESSION['tss_upgrade_error'] = $error;
                    header('Location: upgrade.php?type=configoptions&id=' . $serviceId);
                    exit;
                }
            }

            if(!empty($_SESSION['tss_upgrade_error']))
            {
                $error = $_SESSION['tss_upgrade_error'];
                unset($_SESSION['tss_upgrade_error']);

                return ['errormessage' => '<li>' . htmlspecialchars($error) . '</li>'];
            }
            if($notEnrolled !== '')
            {
                return ['errormessage' => '<li>' . htmlspecialchars($notEnrolled) . '</li>'];
            }
        }

        return [];
    }
}
