<?php

namespace ModulesGarden\tssmodule\Core\WHMCS\Models;

class TicketDepartment extends \WHMCS\Support\Department
{
    public function tickets()
    {
        return $this->hasMany('ModulesGarden\tssmodule\Core\WHMCS\Models\Ticket', "did");
    }
}
