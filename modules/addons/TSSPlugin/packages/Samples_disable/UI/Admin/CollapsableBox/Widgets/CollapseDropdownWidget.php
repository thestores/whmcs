<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CollapsableBox\Widgets;

use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CollapsableBox\Forms\CollapsableDropdownForm;

class CollapseDropdownWidget extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Collapse Example");

        $this->addElement(new CollapsableDropdownForm());
    }
}