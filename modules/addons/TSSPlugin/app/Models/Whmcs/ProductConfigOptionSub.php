<?php

namespace TSSPlugin\App\Models\Whmcs;

class ProductConfigOptionSub extends \WHMCS\Product\ConfigOptionSelection
{
    public function configOption()
    {
        return $this->belongsTo('TSSPlugin\\App\\Models\\Whmcs\\ProductConfigOption', 'configid');
    }
}
