<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Providers;

use ModulesGarden\TSSPlugin\App\Libs\Helpers;
use ModulesGarden\TSSPlugin\App\Repositories\Whmcs\AddonModuleRepository;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Validator;


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