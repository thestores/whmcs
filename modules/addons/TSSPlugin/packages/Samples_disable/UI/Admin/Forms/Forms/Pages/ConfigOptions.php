<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Forms\Pages;

use ModulesGarden\TSSPlugin\Components\Form\AbstractFormConfigOptions;
use ModulesGarden\TSSPlugin\Components\FormInputText\FormInputText;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Forms\Forms\FormWithTabsElements;

class ConfigOptions extends AbstractFormConfigOptions implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->builder->createField(FormInputText::class, 'customconfigoption[text]');
    }
}
