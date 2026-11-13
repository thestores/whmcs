<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs\Forms;

use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs\Providers\EditTabsProvider;

class EditTabsForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = EditTabsProvider::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;

    public function loadHtml(): void
    {
        $this->builder->addField((new Dropdown())->setName("tabsNames")->setMultiple());
    }
}