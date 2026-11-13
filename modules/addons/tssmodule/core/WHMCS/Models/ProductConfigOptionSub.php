<?php

namespace ModulesGarden\tssmodule\Core\WHMCS\Models;

class ProductConfigOptionSub extends \WHMCS\Product\ConfigOptionSelection
{
    public function configOption()
    {
        return $this->belongsTo('ModulesGarden\\tssmodule\\Core\\WHMCS\\Models\\ProductConfigOption', 'configid');
    }
}
