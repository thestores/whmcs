<?php

namespace ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Forms;

use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Providers\ConfigurationProvider;

class EditConfigurationForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = ConfigurationProvider::class;
    protected string $providerAction = CrudProvider::ACTION_UPDATE;

    public function loadHtml(): void
    {
        $this->builder->createField(Switcher::class, 'hideHintBox', true);
        $this->builder->createField(HiddenField::class, 'widgetId');
    }
}