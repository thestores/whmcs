<?php

namespace ModulesGarden\tssmodule\App\Http\Actions;

use ModulesGarden\tssmodule\App\Http\Admin\Home;
use ModulesGarden\tssmodule\Core\UI\ViewConfigOptions;
use ModulesGarden\tssmodule\Core\UI\ViewIntegrationAddon;
use ModulesGarden\tssmodule\Packages\Samples\Http\Admin\Samples;

class ConfigOptions extends \ModulesGarden\tssmodule\Core\App\Controllers\Instances\Server\ConfigOptions
{
    public function execute($params = null)
    {
        return (new ViewConfigOptions())->addElement(new \ModulesGarden\tssmodule\App\UI\Actions\ConfigOptions());
    }
}
