<?php

namespace TSSPlugin\App\Models\Whmcs;

class Contact extends \WHMCS\User\Client\Contact
{
    public function client()
    {
        return $this->belongsTo('TSSPlugin\\App\\Models\\Whmcs\\Client', "userid");
    }

    public function orders()
    {
        return $this->hasMany('TSSPlugin\\App\\Models\\Whmcs\\Order', "id", "orderid");
    }
}
