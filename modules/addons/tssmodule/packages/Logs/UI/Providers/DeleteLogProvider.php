<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Providers;

use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Packages\Logs\Models\Logs;

class DeleteLogProvider extends CrudProvider
{
    public function delete()
    {
        if (!Config::get('logs.delete_logs.enabled', true))
        {
            throw new \Exception('deletingLogsIsNotAllowed');
        }

        $ids = explode(',', $this->formData['id']);

        Logs::whereIn('id', $ids)
            ->delete();
    }
}
