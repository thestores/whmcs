<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CollapsableBox;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CollapsableBox\Widgets\AccordionWidget;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CollapsableBox\Widgets\BaseWidget;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CollapsableBox\Widgets\CollapseDropdownWidget;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CollapsableBox\Widgets\CollapseGroupWidget;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new CollapseDropdownWidget());
        $this->addElement(new BaseWidget());
        $this->addElement(new AccordionWidget());
        $this->addElement(new CollapseGroupWidget());
    }
}