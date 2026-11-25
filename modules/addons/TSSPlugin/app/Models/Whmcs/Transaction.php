<?php

namespace TSSPlugin\App\Models\Whmcs;

class Transaction extends \WHMCS\Billing\Payment\Transaction
{
    public function client()
    {
        return $this->belongsTo('TSSPlugin\\App\\Models\\Whmcs\\Client', "userid");
    }
    public function invoice()
    {
        return $this->belongsTo('TSSPlugin\\App\\Models\\Whmcs\\Invoice', "invoiceid");
    }
}
