<?php

namespace ModulesGarden\TSSPlugin\Packages\ModuleSettings\Services;

use ModulesGarden\TSSPlugin\Core\Data\Container;
use ModulesGarden\TSSPlugin\Core\Support\Arr;
use Psr\Log\LoggerInterface;

class ModuleSettings extends Container
{
    public function __construct()
    {
        $this->data = Arr::undot(\ModulesGarden\TSSPlugin\Packages\ModuleSettings\Models\ModuleSettings::get()->pluck('value', 'setting')->toArray());
    }

    public function store()
    {
        $this->wipe();
        $this->save($this->data);
    }

    public function wipe()
    {
        \ModulesGarden\TSSPlugin\Packages\ModuleSettings\Models\ModuleSettings::delete();
    }

    public function delete($name): self
    {
        \ModulesGarden\TSSPlugin\Packages\ModuleSettings\Models\ModuleSettings::where('setting', $name)->delete();

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
        $model = new \ModulesGarden\TSSPlugin\Packages\ModuleSettings\Models\ModuleSettings();

        if ($model->hasDuplicatedSetting($setting))
        {
            $model->ofSetting($setting)->delete();
        }

        \ModulesGarden\TSSPlugin\Packages\ModuleSettings\Models\ModuleSettings::updateOrCreate([
            'setting' => $setting,
        ], [
            'value' => $value
        ]);
    }
}
