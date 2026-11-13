<?php

namespace ModulesGarden\tssmodule\Core\WHMCS\Models;

class ProductGroup extends \WHMCS\Product\Group
{
    public function products()
    {
        return $this->hasMany('ModulesGarden\\tssmodule\\Core\\WHMCS\\Models\\Product', 'gid');
    }
}
