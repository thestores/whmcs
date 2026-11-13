<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Providers;

use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Packages\Logs\Models\Logs;

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
