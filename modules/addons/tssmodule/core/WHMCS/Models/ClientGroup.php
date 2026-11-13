<?php

namespace ModulesGarden\tssmodule\Core\WHMCS\Models;

/**
 * Description of Category
 *
 * @var id
 * @var groupname
 * @var groupcolour
 * @var discountpercent
 * @var susptermexempt
 * @var separateinvoices
 */
class ClientGroup extends \WHMCS\User\Client\Group
{
    public function clients()
    {
        return $this->hasMany('ModulesGarden\\tssmodule\\Core\\WHMCS\\Models\\Client', 'groupid');
    }
}
