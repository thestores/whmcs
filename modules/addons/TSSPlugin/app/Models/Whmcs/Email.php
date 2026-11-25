<?php

namespace TSSPlugin\App\Models\Whmcs;

class Email extends \WHMCS\Mail\Log
{
    public function client()
    {
        return $this->belongsTo('TSSPlugin\\App\\Models\\Whmcs\\Client', 'userid');
    }
}
