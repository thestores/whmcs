<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Providers;

use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Support\Facades\Validator;


class CronSettingsProvider extends CrudProvider
{
    public function read()
    {
        $moduleRepository    = new AddonModuleRepository();
        $moduleConfiguration = $moduleRepository->getModuleConfiguration();

        foreach($moduleConfiguration['cronSettings'] as $key => $value)
        {
            $this->data[$key] = $value;
        }
    }

    public function update()
    {
        $data = $this->formData->toArray();
        (new AddonModuleRepository)->saveCronSettings($data);
    }
}