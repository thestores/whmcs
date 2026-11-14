<?php

namespace ModulesGarden\TSSPlugin\Core\WHMCS\Models;

class ProductGroup extends \WHMCS\Product\Group
{
    public function products()
    {
        return $this->hasMany('ModulesGarden\\TSSPlugin\\Core\\WHMCS\\Models\\Product', 'gid');
    }
}
