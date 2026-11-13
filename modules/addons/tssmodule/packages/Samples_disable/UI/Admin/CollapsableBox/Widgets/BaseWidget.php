<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CollapsableBox\Widgets;

use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Actions\Collapse;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CollapsableBox\Forms\CollapsableForm;

class BaseWidget extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Collapse Example");
        
        $this->addElement(new CollapsableForm());
    }
}