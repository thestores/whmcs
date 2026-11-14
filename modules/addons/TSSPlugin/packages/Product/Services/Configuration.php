<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Services;

use ModulesGarden\TSSPlugin\Core\Support\Facades\Params;
use ModulesGarden\TSSPlugin\Packages\Product\Libs\Configuration\ConfigurationContainer;
use ModulesGarden\TSSPlugin\Packages\Product\Support\Factories\ConfigurationFactory;

class Configuration
{
    protected static ConfigurationContainer $configurationContainer;

    public function __construct()
    {
        $this->load();
    }

    protected function load():void
    {
        static::$configurationContainer = ConfigurationFactory::fromParams(Params::all());
    }

    public function getConfiguration():ConfigurationContainer
    {
        return static::$configurationContainer;
    }

    public function setConfiguration(ConfigurationContainer $configuration):self
    {
        static::$configurationContainer = $configuration;

        return $this;
    }
}