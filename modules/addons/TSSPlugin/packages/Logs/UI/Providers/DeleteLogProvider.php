<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Providers;

use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;
use ModulesGarden\TSSPlugin\Packages\Logs\Models\Logs;

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
