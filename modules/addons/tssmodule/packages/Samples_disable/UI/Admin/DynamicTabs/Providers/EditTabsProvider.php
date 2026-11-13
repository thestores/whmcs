<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs\Providers;

use ModulesGarden\tssmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;
use ModulesGarden\tssmodule\Core\Components\Response\Response;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Packages\ModuleSettings\Support\Facades\ModuleSettings;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs\Pages\DynamicTabs;

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