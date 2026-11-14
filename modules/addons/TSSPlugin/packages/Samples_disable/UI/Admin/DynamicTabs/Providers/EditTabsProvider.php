<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs\Providers;

use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalClose;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Reload;
use ModulesGarden\TSSPlugin\Core\Components\Response\Response;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Packages\ModuleSettings\Support\Facades\ModuleSettings;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs\Pages\DynamicTabs;

class EditTabsProvider extends CrudProvider
{
    public function read()
    {
        $this->availableValues['tabsNames'] = $this->getAvailableTabs();
        $this->data->set('tabsNames', json_decode(ModuleSettings::get('samples.dynamicTabsNames', [])));
    }

    public function update()
    {
        ModuleSettings::save(['samples.dynamicTabsNames' => json_encode($this->formData->get('tabsNames', []))]);

        return (new Response())->setSuccess("Tab Edited Successfully")
            ->setActions([new Reload(new DynamicTabs()), new ModalClose()]);
    }

    public function getAvailableTabs():array
    {
        $availableTabs = [];

        for ($i = 1 ; $i < 10 ; $i++)
        {
            $availableTabs["Tab" . $i] = "Tab" . $i;
        }

        return $availableTabs;
    }
}