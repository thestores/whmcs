<?php


use ModulesGarden\tssmodule\App\Helpers\EmailTemplates;
use ModulesGarden\tssmodule\App\Libs\AcmeHelpers;
use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Service;

$hookManager->register(
    function($args) {
        // WHMCS passes the invoice ID only; a failure here must never break the payment
        try
        {
            // domains bought on the module's invoice ("Buy more domains")
            \ModulesGarden\tssmodule\App\Libs\SubscriptionBilling::applySlotPurchase((int)($args['invoiceid'] ?? 0));

            $items = \WHMCS\Database\Capsule::table('tblinvoiceitems')
                ->where('invoiceid', (int)($args['invoiceid'] ?? 0))
                ->where('type', 'Hosting')
                ->where('description', 'like', '%' . AcmeHelpers::RENEWAL_LABEL . '%')
                ->get(['relid']);

            foreach($items as $item)
            {
                // the same subscription carries on: its renewal and due date move one year on
                \ModulesGarden\tssmodule\App\Libs\SubscriptionBilling::renewalPaid((int)$item->relid, (int)($args['invoiceid'] ?? 0));
                $service = Service::find((int)$item->relid);

                if($service && \ModulesGarden\tssmodule\App\Libs\SubscriptionBilling::isSubscriptionProduct($service->packageid))
                {
                    EmailTemplates::sendEmail(EmailTemplates::SUBSCRIPTION_RENEWAL_TEMPLATE, $service->id, []);
                }
            }
        }
        catch(\Throwable $e)
        {
            logActivity('SSL module: the ACME subscription renewal e-mail could not be sent: ' . $e->getMessage());
        }
    },
    100
);
