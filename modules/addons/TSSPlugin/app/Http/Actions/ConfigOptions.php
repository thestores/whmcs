<?php

namespace ModulesGarden\TSSPlugin\App\Http\Actions;

use ModulesGarden\TSSPlugin\App\Http\Admin\Home;
use ModulesGarden\TSSPlugin\Core\UI\ViewConfigOptions;
use ModulesGarden\TSSPlugin\Core\UI\ViewIntegrationAddon;
use ModulesGarden\TSSPlugin\Packages\Samples\Http\Admin\Samples;

class ConfigOptions extends \ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Server\ConfigOptions
{
    public function execute($params = null)
    {
        return (new ViewConfigOptions())->addElement(new \ModulesGarden\TSSPlugin\App\UI\Actions\ConfigOptions());
    }
}
