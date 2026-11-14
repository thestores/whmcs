<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs\Pages;

use ModulesGarden\TSSPlugin\Components\MarkdownEditor\MarkdownEditor;
use ModulesGarden\TSSPlugin\Components\Tab\Tab;
use ModulesGarden\TSSPlugin\Components\TabsWidget\TabsWidget;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButton;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalLoad;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\ModuleSettings\Support\Facades\ModuleSettings;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs\Modals\EditTabsModal;

class DynamicTabs extends TabsWidget implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Dynamic Tabs Sample");

        $tabsNames = json_decode(ModuleSettings::get('samples.dynamicTabsNames')) ?: [];

        asort($tabsNames);

        array_unshift($tabsNames, "Default Tab");

        foreach ($tabsNames as $tabsName)
        {
            $tab = new Tab();
            $tab->setTitle($tabsName);
            $tab->addElement(new MarkdownEditor());
            $this->addTab($tab);
        }

        $this->addToToolbar((new IconButton())
            ->setTitle("Edit")
            ->setIcon("plus")
            ->onClick(new ModalLoad(new EditTabsModal)));
    }
}