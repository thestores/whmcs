<?php

namespace TSSPlugin\Server\app\hooks;

use WHMCS\Database\Capsule;

/**
 * WHMCS hook AfterInvoicingGenerateInvoiceItems (registered in hooks.php).
 */
class RenewalInvoiceWindowAfter
{
    public static function handle($vars)
    {
        $dates = isset($GLOBALS['tss_renewal_invoice_dates']) ? (array)$GLOBALS['tss_renewal_invoice_dates'] : [];
        unset($GLOBALS['tss_renewal_invoice_dates']);
        foreach($dates as $serviceId => $date)
        {
            try
            {
                // only where nothing else moved it in the meantime
                Capsule::table('tblhosting')->where('id', (int)$serviceId)->where('nextinvoicedate', '2099-12-31')->update(['nextinvoicedate' => $date]);
            }
            catch(\Throwable $e)
            {
                logActivity('TSSPlugin renewal invoices: next invoice date of service #' . (int)$serviceId . ' could not be put back: ' . $e->getMessage());
            }
        }
    }
}
