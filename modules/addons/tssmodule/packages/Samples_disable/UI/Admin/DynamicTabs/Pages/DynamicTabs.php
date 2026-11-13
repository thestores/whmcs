<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs\Pages;

use ModulesGarden\tssmodule\Components\MarkdownEditor\MarkdownEditor;
use ModulesGarden\tssmodule\Components\Tab\Tab;
use ModulesGarden\tssmodule\Components\TabsWidget\TabsWidget;
use ModulesGarden\tssmodule\Components\IconButton\IconButton;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalLoad;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\ModuleSettings\Support\Facades\ModuleSettings;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs\Modals\EditTabsModal;

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