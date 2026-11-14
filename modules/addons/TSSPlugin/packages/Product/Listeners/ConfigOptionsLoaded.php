<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Listeners;

use ModulesGarden\TSSPlugin\Core\Events\Listener;
use ModulesGarden\TSSPlugin\Core\Support\Facades\LogActivity;
use ModulesGarden\TSSPlugin\Packages\Product\Database\Tables\TablesManager;
use Illuminate\Database\Capsule\Manager as DB;

class ConfigOptionsLoaded extends Listener
{
    public function handle($payload = [])
    {
        try
        {
            TablesManager::processSchemaQueries();
            TablesManager::processUpgradeQueries();
        }
        catch (\Throwable $ex)
        {
            LogActivity::error($ex->getMessage());
        }
    }
}
