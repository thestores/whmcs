<?php

namespace ModulesGarden\tssmodule\Packages\Product\Listeners;

use ModulesGarden\tssmodule\Core\Events\Listener;
use ModulesGarden\tssmodule\Core\Support\Facades\LogActivity;
use ModulesGarden\tssmodule\Packages\Product\Database\Tables\TablesManager;
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
