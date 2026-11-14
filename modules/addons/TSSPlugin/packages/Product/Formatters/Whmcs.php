<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Formatters;

use ModulesGarden\TSSPlugin\Packages\Product\Services\ProductParameters;

class Whmcs
{
    public static function format(ProductParameters $params)
    {
        $whmcsParams = $params->getAll();
        $whmcsParams['configoptions'] = array_merge($params->getProductConfigurations(), $whmcsParams['configoptions']);

        return $whmcsParams;
    }
}