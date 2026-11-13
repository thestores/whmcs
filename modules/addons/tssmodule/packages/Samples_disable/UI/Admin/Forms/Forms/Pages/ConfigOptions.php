<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Forms\Pages;

use ModulesGarden\tssmodule\Components\Form\AbstractFormConfigOptions;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Forms\Forms\FormWithTabsElements;

class ConfigOptions extends AbstractFormConfigOptions implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->builder->createField(FormInputText::class, 'customconfigoption[text]');
    }
}
