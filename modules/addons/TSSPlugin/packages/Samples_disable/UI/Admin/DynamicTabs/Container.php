<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs\Pages\DynamicTabs;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new DynamicTabs());
    }
}