<?php

namespace ModulesGarden\TSSPlugin\Core\WHMCS\Models;

class Email extends \WHMCS\Mail\Log
{
    public function client()
    {
        return $this->belongsTo('ModulesGarden\\TSSPlugin\\Core\\WHMCS\\Models\\Client', 'userid');
    }
}
