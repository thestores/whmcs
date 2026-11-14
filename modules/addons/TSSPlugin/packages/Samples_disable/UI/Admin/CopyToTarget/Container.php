<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CopyToTarget;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CopyToTarget\Widgets\BaseWidget;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new BaseWidget());
    }
}