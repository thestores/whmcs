<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Providers;

use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;
use ModulesGarden\TSSPlugin\Packages\Logs\Models\Logs;

/**
 * "Clean log": removes every entry of the module log
 */
class CleanLogProvider extends CrudProvider
{
    public function delete()
    {
        if (!Config::get('logs.delete_logs.enabled', true))
        {
            throw new \Exception('deletingLogsIsNotAllowed');
        }

        Logs::query()->delete();
    }
}
