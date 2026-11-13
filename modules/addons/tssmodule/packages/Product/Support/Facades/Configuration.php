<?php

namespace ModulesGarden\tssmodule\Packages\Product\Support\Facades;

use ModulesGarden\tssmodule\Core\Support\Facades\AbstractFacade;
use ModulesGarden\tssmodule\Packages\Product\Libs\Configuration\ConfigurationContainer;

/**
 * @method static ConfigurationContainer getConfiguration()
 * @method static setConfiguration(ConfigurationContainer $configuration)
 */
class Configuration extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\tssmodule\Packages\Product\Services\Configuration::class;
    }
}