<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CollapsableBox;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\AccordionWidget;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\BaseWidget;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\CollapseDropdownWidget;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\CollapseGroupWidget;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new CollapseDropdownWidget());
        $this->addElement(new BaseWidget());
        $this->addElement(new AccordionWidget());
        $this->addElement(new CollapseGroupWidget());
    }
}