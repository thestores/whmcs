<?php

namespace TSSPlugin\Server\app\hooks;


/**
 * while WHMCS still builds the invoice (WHMCS 9 refuses changes to a finalised one)
 *
 * WHMCS hook InvoiceCreation (registered in hooks.php).
 */
class UpgradeInvoiceCreation
{
    public static function handle($vars)
    {
        try
        {
            \TSSPlugin\App\Libs\Billing\UpgradePricing::cleanOneTimePeriods(isset($vars['invoiceid']) ? (int)$vars['invoiceid'] : 0);
            \TSSPlugin\App\Libs\Billing\UpgradePricing::fixInvoice(isset($vars['invoiceid']) ? (int)$vars['invoiceid'] : 0);
        }
        catch(\Throwable $e)
        {
            logActivity('TSSPlugin: SAN upgrade invoice could not be corrected: ' . $e->getMessage());
        }
    }
}
