<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Support\Facades;

use ModulesGarden\TSSPlugin\Core\Support\Facades\AbstractFacade;
use ModulesGarden\TSSPlugin\Packages\Product\Libs\Configuration\ConfigurationContainer;

/**
 * @method static ConfigurationContainer getConfiguration()
 * @method static setConfiguration(ConfigurationContainer $configuration)
 */
class Configuration extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\TSSPlugin\Packages\Product\Services\Configuration::class;
    }
}