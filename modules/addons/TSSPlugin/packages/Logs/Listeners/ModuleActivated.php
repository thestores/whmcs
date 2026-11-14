<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\Listeners;

use ModulesGarden\TSSPlugin\Core\Database\FileLoader;
use ModulesGarden\TSSPlugin\Core\Events\Listener;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;

class ModuleActivated extends Listener
{
    public function handle($payload = [])
    {
        (new FileLoader())->performQueryFromFile(ModuleConstants::getFullPath('packages', 'Logs', 'resources', 'database', 'schema.sql'));
    }
}
