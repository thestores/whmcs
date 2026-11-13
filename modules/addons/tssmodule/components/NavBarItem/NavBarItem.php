<?php

namespace ModulesGarden\tssmodule\Components\NavBarItem;

use ModulesGarden\tssmodule\App\Libs\Icons;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TitleTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\UrlTrait;

/**
 * Class Form
 */
class NavBarItem extends AbstractComponent
{
    use TitleTrait;
    use UrlTrait;
    use ComponentsContainerTrait;

    public const COMPONENT = 'NavBarItem';

 

    public function setActive(bool $active): self
    {
        $this->setSlot('active', $active);

        return $this;
    }

    public function setIcon(string $icon): self
    {
        // inline SVG (the menu config gives "mdi mdi-NAME"); the name only when it has no SVG yet
        $svg = Icons::svg($icon);
        $this->setSlot('icon', $svg !== '' ? $svg : $icon);

        return $this;
    }



    public function addItem(NavBarItem $item): self
    {
        $this->addElement($item);

        return $this;
    }
}
