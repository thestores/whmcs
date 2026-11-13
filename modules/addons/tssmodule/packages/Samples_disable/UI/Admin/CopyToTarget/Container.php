<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CopyToTarget;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CopyToTarget\Widgets\BaseWidget;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new BaseWidget());
    }
}