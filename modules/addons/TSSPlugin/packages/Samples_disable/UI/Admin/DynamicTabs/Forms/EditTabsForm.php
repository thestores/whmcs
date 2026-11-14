<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs\Forms;

use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs\Providers\EditTabsProvider;

class EditTabsForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = EditTabsProvider::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;

    public function loadHtml(): void
    {
        $this->builder->addField((new Dropdown())->setName("tabsNames")->setMultiple());
    }
}