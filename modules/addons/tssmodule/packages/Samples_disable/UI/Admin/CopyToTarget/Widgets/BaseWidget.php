<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CopyToTarget\Widgets;

use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CopyToTarget\Forms\BaseForm;

class BaseWidget extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Copy To Target Sample");

        $this->addElement(new BaseForm());
    }
}