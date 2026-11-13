<?php

namespace ModulesGarden\tssmodule\Packages\ModuleSettings\Services;

use ModulesGarden\tssmodule\Core\Data\Container;
use ModulesGarden\tssmodule\Core\Support\Arr;
use Psr\Log\LoggerInterface;

class ModuleSettings extends Container
{
    public function __construct()
    {
        $this->data = Arr::undot(\ModulesGarden\tssmodule\Packages\ModuleSettings\Models\ModuleSettings::get()->pluck('value', 'setting')->toArray());
    }

    public function store()
    {
        $this->wipe();
        $this->save($this->data);
    }

    public function wipe()
    {
        \ModulesGarden\tssmodule\Packages\ModuleSettings\Models\ModuleSettings::delete();
    }

    public function delete($name): self
    {
        \ModulesGarden\tssmodule\Packages\ModuleSettings\Models\ModuleSettings::where('setting', $name)->delete();

        return parent::delete($name);
    }

    public function save(array $settings = [])
    {
        foreach ($settings as $setting => $value)
        {
            $this->set($setting, $value);
            $this->update($setting, $value);
        }
    }

    public function update($setting, $value)
    {
        $model = new \ModulesGarden\tssmodule\Packages\ModuleSettings\Models\ModuleSettings();

        if ($model->hasDuplicatedSetting($setting))
        {
            $model->ofSetting($setting)->delete();
        }

        \ModulesGarden\tssmodule\Packages\ModuleSettings\Models\ModuleSettings::updateOrCreate([
            'setting' => $setting,
        ], [
            'value' => $value
        ]);
    }
}
