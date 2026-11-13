<?php

namespace ModulesGarden\tssmodule\Components\NavBar;

use ModulesGarden\tssmodule\Components\NavBarItem\NavBarItem;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\ToolbarTrait;

/**
 * Class Form
 */
class NavBar extends AbstractComponent
{
    use ComponentsContainerTrait;
    use ToolbarTrait;

    public const COMPONENT = 'NavBar';

    public function __construct()
    {
        parent::__construct();
        $this->withPadding();
    }

    public function withPadding($padding = 'lu-m-b-4x'): self
    {
        $this->setSlot('paddingClass', $padding);

        return $this;
    }

    public function addItem(NavBarItem $item): self
    {
        $this->addElement($item);

        return $this;
    }
}
