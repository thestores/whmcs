<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Support\Factories;

use ModulesGarden\TSSPlugin\Core\Data\Container;
use ModulesGarden\TSSPlugin\Core\WHMCS\ModuleParamsBuilder;
use ModulesGarden\TSSPlugin\Packages\Product\Libs\Configuration\ConfigurationContainer;
use ModulesGarden\TSSPlugin\Packages\Product\Services\ProductConfiguration;

class ConfigurationFactory
{
    public static function fromProduct(int $productId):ConfigurationContainer
    {
        $productConfiguration = new ProductConfiguration($productId);

        return (new ConfigurationContainer())
            ->setProductSetting($productConfiguration->get());
    }

    public static function fromService(int $serviceId): ConfigurationContainer
    {
        return self::fromParams((new ModuleParamsBuilder())->get($serviceId));
    }

    public static function fromParams(array $params): ConfigurationContainer
    {
        $paramsContainer = new Container($params);

        $configurationContainer = new ConfigurationContainer();

        if ($serviceId = $paramsContainer->get('serviceid'))
        {
            $configurationContainer->setServiceId($serviceId);
        }

        if ($productId = $paramsContainer->get('packageid'))
        {
            $configurationContainer->setProductSetting((new ProductConfiguration($productId))->get());
        }

        return $configurationContainer
            ->setCustomFields($paramsContainer->get('customfields', []))
            ->setConfigurableOptions($paramsContainer->get('configoptions', []));
    }
}