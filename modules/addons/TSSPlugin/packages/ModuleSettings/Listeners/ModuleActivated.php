<?php

namespace ModulesGarden\TSSPlugin\Packages\ModuleSettings\Listeners;

use ModulesGarden\TSSPlugin\Core\Database\FileLoader;
use ModulesGarden\TSSPlugin\Core\Events\Listener;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;

class ModuleActivated extends Listener
{
    public function handle($payload = [])
    {
        (new FileLoader())
            ->performQueryFromFile(ModuleConstants::getFullPath('packages', 'ModuleSettings', 'Database', 'Schema.sql'));
    }
}
