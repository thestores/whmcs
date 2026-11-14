<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\UI\Providers;

use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Packages\Product\Helpers\ProductConfiguration as ProductConfigurationHelper;
use \ModulesGarden\TSSPlugin\Packages\Product\Services\ProductConfiguration as ProductConfigurationService;

class ProductConfiguration extends CrudProvider
{
    public function read()
    {
        $type = ProductConfigurationHelper::isRunAsProductAddon() ? ProductConfigurationService::PRODUCT_ADDON_TYPE : ProductConfigurationService::PRODUCT_TYPE;

        $data = (new ProductConfigurationService(Request::get('id', 0), $type))
            ->get();

        foreach ($data as $setting => $value)
        {
            $this->data[sprintf('customconfigoption[%s]', $setting)] = $value;

            if (is_array($value))
            {
                foreach ($value as $key => $subValue)
                {
                    $this->data[sprintf("customconfigoption[%s][{$key}]", $setting)] = $subValue;
                }
            }
        }
    }
}
