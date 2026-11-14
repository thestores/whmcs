<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\HintsBox\Providers;

use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Packages\ModuleSettings\Support\Facades\ModuleSettings;

class SettingsProvider extends CrudProvider
{
    public function read()
    {
        $this->data['hideGuide'] = ModuleSettings::get('HintsBox.hide_guide');
    }

    public function update()
    {
        ModuleSettings::save(['HintsBox.hide_guide' => $this->formData->get('hideGuide'),]);
    }
}