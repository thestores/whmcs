<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Listeners;

use ModulesGarden\TSSPlugin\Core\Database\FileLoader;
use ModulesGarden\TSSPlugin\Core\Events\Listener;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;
use ModulesGarden\TSSPlugin\Core\Support\Facades\LogActivity;

class ModuleUpgraded extends Listener
{
    public function handle($payload = [])
    {
        try
        {
            (new FileLoader())->performQueryFromFile(ModuleConstants::getFullPath('packages', 'Product', 'resources', 'database', 'schema.sql'));
        }
        catch (\Throwable $ex)
        {
            LogActivity::error($ex->getMessage());
        }
    }
}