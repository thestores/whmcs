<?php

namespace TSSPlugin\Server\app\hooks;

use WHMCS\Database\Capsule;

/**
 * ---- Renewal invoices: the module creates them, never WHMCS (App\Libs\Billing\RenewalPolicy) ---- //
 * WHMCS invoices a service when its next invoice date enters the generation window. Right before it generates
 * invoices, the module's recurring services have that date moved out of the window; right after, it is put back.
 * So a renewal is billed once, on the module's terms (N days before the order end, at most 30), and the dates the
 * administrator sees do not change.
 *
 * WHMCS hook PreInvoicingGenerateInvoiceItems (registered in hooks.php).
 */
class RenewalInvoiceWindowBefore
{
    public static function handle($vars)
    {
        try
        {
            // the "Create Automatic Renewal Invoice" switch decides who invoices: off, WHMCS does, as it always did -
            // except for certificates kept as a record of the legacy module (App\Libs\Certificates\RecordOnly): never invoiced
            $moduleInvoices = \TSSPlugin\App\Libs\Billing\RenewalPolicy::invoicing(\TSSPlugin\App\Libs\Billing\RenewalPolicy::CERTIFICATE);

            $query = Capsule::table('tblhosting')
                ->join('tblproducts', 'tblproducts.id', '=', 'tblhosting.packageid')
                ->where('tblproducts.servertype', 'TSSPlugin')
                ->whereNotIn('tblhosting.billingcycle', ['One Time', 'Free Account', 'Free'])
                ->where('tblhosting.nextinvoicedate', '>', '2000-01-01')
                ->where('tblhosting.nextinvoicedate', '<', '2099-01-01');
            if(!$moduleInvoices)
            {
                \TSSPlugin\App\Libs\Certificates\RecordOnly::only($query);
            }
            $rows = $query->get(['tblhosting.id', 'tblhosting.nextinvoicedate']);

            $GLOBALS['tss_renewal_invoice_dates'] = [];
            foreach($rows as $row)
            {
                $GLOBALS['tss_renewal_invoice_dates'][(int)$row->id] = (string)$row->nextinvoicedate;
            }
            if($GLOBALS['tss_renewal_invoice_dates'])
            {
                Capsule::table('tblhosting')->whereIn('id', array_keys($GLOBALS['tss_renewal_invoice_dates']))->update(['nextinvoicedate' => '2099-12-31']);
            }
        }
        catch(\Throwable $e)
        {
            logActivity('TSSPlugin renewal invoices: WHMCS invoicing could not be held back: ' . $e->getMessage());
        }
    }
}
