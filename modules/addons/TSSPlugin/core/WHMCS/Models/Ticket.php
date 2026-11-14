<?php

namespace ModulesGarden\TSSPlugin\Core\WHMCS\Models;

class Ticket extends \WHMCS\Support\Ticket
{
    public function client()
    {
        return $this->belongsTo('ModulesGarden\TSSPlugin\Core\WHMCS\Models\Client', 'userid');
    }

    public function contact()
    {
        return $this->belongsTo('ModulesGarden\\TSSPlugin\\Core\\WHMCS\\Models\\Contact', "contactid");
    }

    public function department()
    {
        return $this->belongsTo('ModulesGarden\\TSSPlugin\\Core\\WHMCS\\Models\\TicketDepartment', 'did');
    }

    public function replies()
    {
        return $this->hasMany('ModulesGarden\TSSPlugin\Core\WHMCS\Models\TicketReply', 'tid');
    }

    public function flaggedAdmin()
    {
        return $this->belongsTo('ModulesGarden\\TSSPlugin\\Core\\WHMCS\\Models\\Admins', "flag");
    }

    public function updateStatus($status)
    {
        $this->status = $status;
        $this->save();
    }
}
