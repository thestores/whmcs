<?php

namespace ModulesGarden\tssmodule\Packages\Product\Services;

use ModulesGarden\tssmodule\Core\Support\Facades\Params;
use ModulesGarden\tssmodule\Packages\Product\Libs\Configuration\ConfigurationContainer;
use ModulesGarden\tssmodule\Packages\Product\Support\Factories\ConfigurationFactory;

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