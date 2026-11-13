<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Providers;

use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\App\Models\CronCheck;
use ModulesGarden\tssmodule\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Forms\DownloadLogForm;
use ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Shared\LogProvider;
use ModulesGarden\tssmodule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\tssmodule\Core\Components\Response\Response;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;


class ReportingProvider extends CrudProvider
{
    public function read()
    {
        $this->data = $this->formData;
        global $CONFIG;

        $moduleRepository    = new AddonModuleRepository();
        $moduleConfiguration = $moduleRepository->getModuleConfiguration();

        $this->data['whmcsUrl']      = $CONFIG['SystemURL'];
        $this->data['moduleVersion'] = Config::get('configuration.version');
        $this->data['tssPartnerId']  = trim($moduleConfiguration['credentials']['tss']['PartnerCode']);
        $this->data['ggsPartnerId']  = trim($moduleConfiguration['credentials']['ggs']['PartnerCode']);
        $this->data['phpVersion']    = phpversion();
        $this->data['fromDate']      = date('Y-m-d', strtotime("-7 days"));
        $this->data['toDate']        = date('Y-m-d');


        $expectedCrons = [
            'ProductPricingUpdate',
            'SSLCertificates',
            'RenewalNotifyCertificate',
            'ReSyncProducts',
            'SSLCertificatesProcessing',
            'SSLAutoInstall',
        ];

        $issues = 0;

        foreach($expectedCrons as $expectedCron)
        {
            $cronCheck = CronCheck::where('type', $expectedCron)->where('last_run', '>', date('Y-m-d H:i:s', strtotime('-1 day')))->first();

            if($cronCheck)
            {
                $error = trim($cronCheck->last_error);

                if($error)
                {
                    $issues++;
                }
            }
            else
            {
                $issues++;
            }
        }

        if($issues)
        {
            $this->data['cronStatus'] = 'Issues: ' . $issues;
        }
        else
        {
            $this->data['cronStatus'] = 'No issues';
        }
    }

    public function create()
    {

    }

    public function send()
    {
        try
        {
            global $CONFIG;

            $logProvider = new LogProvider();
            // each edition reports to its own vendor
            $to          = \ModulesGarden\tssmodule\App\Libs\Edition::get() === \ModulesGarden\tssmodule\App\Libs\Edition::GGS ? 'support@gogetssl.com' : 'apisupport@thesslstore.com';
            $message     = new \WHMCS\Mail\Message();
            $subject     = 'NEW WHMCS ' . \ModulesGarden\tssmodule\App\Libs\Edition::name() . ' issue reported';
            $body        = <<<BODY
                Dear Support,<br><br>Here is a new issue reported from {$CONFIG['CompanyName']}.
BODY;
            $message->setSubject($subject);
            $message->setPlainText($body);
            $message->clearRecipients("to");
            $message->addRecipient("to", $to);
            $message->setFromName(\WHMCS\Config\Setting::getValue("SystemEmailsFromName"));
            $message->addStringAttachment('log.txt', $logProvider->getLog($this->formData->toArray()));
            \WHMCS\Module\Mail::factory()->send($message);
        }
        catch(\Exception $e)
        {
            throw $e;
        }
    }

    public function download()
    {
        return (new Response())
            ->setSuccess($this->translate('logDownloadedSuccessfully'))
            ->setActions([
                             new DownloadFileFromForm(new DownloadLogForm(), $this->formData->toArray()),
                         ]);
    }
}