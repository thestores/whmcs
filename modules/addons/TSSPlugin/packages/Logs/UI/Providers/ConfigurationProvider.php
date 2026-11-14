<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Providers;

use ModulesGarden\TSSPlugin\App\Libs\GeneralSettings;
use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Providers\GeneralSettingsProvider;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Validator;
use ModulesGarden\TSSPlugin\Core\Validation\Rule;
use ModulesGarden\TSSPlugin\Packages\Logs\Enums\LogTypes;
use ModulesGarden\TSSPlugin\Packages\Logs\Support\Translations\LogsTypeTranslator;
use ModulesGarden\TSSPlugin\Packages\ModuleSettings\Support\Facades\ModuleSettings;

class ConfigurationProvider extends CrudProvider
{
    public function read()
    {
        $this->data->set('logging', GeneralSettings::enabled('internalLog'));
        $this->data->set('api_mode', \ModulesGarden\TSSPlugin\App\Libs\LogPolicy::apiMode());
        $this->data->set('events', GeneralSettings::enabled('eventLog'));
        $this->data->set('debug_services', implode(', ', \ModulesGarden\TSSPlugin\App\Libs\LogPolicy::debugServices()));
        $this->data->set('debug_hours', '4');
        $this->data->set('types', $this->formData->get('types', ModuleSettings::get('logs.types')));
        $this->data->set('auto_prune', $this->formData->get('auto_prune', ModuleSettings::get('logs.auto_prune', 1)));
        $this->data->set('auto_prune_older_than', $this->formData->get('auto_prune_older_than', ModuleSettings::get('logs.auto_prune_older_than', 30)));

        $this->availableValues['api_mode']    = GeneralSettingsProvider::apiModeOptions($this);
        $this->availableValues['debug_hours'] = GeneralSettingsProvider::debugHourOptions($this);
        $this->availableValues['types'] = (new LogsTypeTranslator)->getAvailableTranslated();
    }

    public function update()
    {
        $this->validate(
            $this->formData->toArray(),
            [
                'types.*'               => ['sometimes', Rule::in(LogTypes::getAvailable())],
                'auto_prune'            => ['sometimes', Rule::in(0, 1)],
                'auto_prune_older_than' => ['required_if:auto_prune,1', 'numeric', 'min:1']
            ],
            [
                'auto_prune' => [1]
            ]
        );

        GeneralSettingsProvider::saveGeneral([
            'internalLog' => $this->formData->get('logging'),
            'apiLogMode'  => $this->formData->get('api_mode'),
            'eventLog'    => $this->formData->get('events'),
            'debugServices' => $this->formData->get('debug_services', ''),
            'debugHours'  => $this->formData->get('debug_hours', 0),
        ]);

        ModuleSettings::save([
            'logs.types'                 => $this->formData->get('types', ""),
            'logs.auto_prune'            => $this->formData->get('auto_prune'),
            'logs.auto_prune_older_than' => $this->formData->get('auto_prune_older_than', 0)
        ]);
    }
}
