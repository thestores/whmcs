<?php

namespace ModulesGarden\tssmodule\Packages\ModuleSettings\Listeners;

use ModulesGarden\tssmodule\Core\Database\FileLoader;
use ModulesGarden\tssmodule\Core\Events\Listener;
use ModulesGarden\tssmodule\Core\ModuleConstants;

class ModuleActivated extends Listener
{
    public function handle($payload = [])
    {
        (new FileLoader())
            ->performQueryFromFile(ModuleConstants::getFullPath('packages', 'ModuleSettings', 'Database', 'Schema.sql'));
    }
}
