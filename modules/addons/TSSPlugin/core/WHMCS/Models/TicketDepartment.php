<?php

namespace ModulesGarden\TSSPlugin\Core\WHMCS\Models;

class TicketDepartment extends \WHMCS\Support\Department
{
    public function tickets()
    {
        return $this->hasMany('ModulesGarden\TSSPlugin\Core\WHMCS\Models\Ticket', "did");
    }
}
