<?php

namespace ModulesGarden\TSSPlugin\Fragments\ConfigurableHintBox\UI\Providers;

use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalClose;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadById;
use ModulesGarden\TSSPlugin\Core\Components\Response\Response;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Packages\ModuleSettings\Support\Facades\ModuleSettings;

class ConfigurationProvider extends CrudProvider
{
    public function read()
    {
        $widgetId = $this->formData->get('widgetId');

        $this->data->set('widgetId', $widgetId);
        $this->data->set('hideHintBox', ModuleSettings::get('hideHintBox-' . $widgetId));
    }

    public function update()
    {
        $widgetId = $this->formData->get('widgetId');

        if (empty($widgetId))
        {
            throw new \Exception("guideIdNotFound");
        }

        ModuleSettings::update('hideHintBox-' . $widgetId, $this->formData->get('hideHintBox'));

        return (new Response())
            ->setSuccess($this->translate('update_success'))
            ->setActions([new ReloadById($widgetId),  new ModalClose()]);
    }
}