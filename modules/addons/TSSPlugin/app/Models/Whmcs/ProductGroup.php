<?php

namespace TSSPlugin\App\Models\Whmcs;

class ProductGroup extends \WHMCS\Product\Group
{
    public function products()
    {
        return $this->hasMany('TSSPlugin\\App\\Models\\Whmcs\\Product', 'gid');
    }
}
