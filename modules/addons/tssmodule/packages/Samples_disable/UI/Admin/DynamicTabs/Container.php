<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs\Pages\DynamicTabs;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new DynamicTabs());
    }
}