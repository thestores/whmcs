<?php

namespace ModulesGarden\TSSPlugin\Core\WHMCS\Models;

class ProductConfigOptionSub extends \WHMCS\Product\ConfigOptionSelection
{
    public function configOption()
    {
        return $this->belongsTo('ModulesGarden\\TSSPlugin\\Core\\WHMCS\\Models\\ProductConfigOption', 'configid');
    }
}
