<?php

namespace ModulesGarden\TSSPlugin\Components\ListSimple;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\CssContainerTrait;

class ListSimple extends AbstractComponent
{
    use ComponentsContainerTrait;
    use CssContainerTrait;

    public const COMPONENT = 'ListSimple';

    public function addItem($item): self
    {
        $this->addElement($item);

        return $this;
    }
}
