<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Providers;

use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Core\Support\Facades\Validator;
use ModulesGarden\tssmodule\Packages\Logs\Models\Logs;
use ModulesGarden\tssmodule\Packages\Logs\Support\Translations\LogsTypeTranslator;

class MassDeleteProvider extends CrudProvider
{
    public function read()
    {
        $this->availableValues['types'] = (new LogsTypeTranslator)->getUsedTranslated();
    }

    public function delete()
    {
        Validator::validate($this->formData->toArray(), [
            'delete_older_than' => ['numeric', 'min:0']
        ]);

        if (!Config::get('logs.delete_logs.enabled', true))
        {
            throw new \Exception('deletingLogsIsNotAllowed');
        }

        $types     = $this->formData['types'];
        $olderThan = (int)$this->formData['delete_older_than'];

        $logsModel = Logs::query();

        if (!empty($types))
        {
            $logsModel = $logsModel->whereIn('type', $types);
        }

        if ($olderThan > 0)
        {
            $nowDate        = new \DateTime('Now');
            $dateInterval   = new \DateInterval('P' . $olderThan . 'D');
            $dateForCompare = $nowDate->sub($dateInterval);
            $logsModel      = $logsModel->where('date', '<', $dateForCompare->format('Y-m-d'));
        }

        $logsModel->delete();
    }
}