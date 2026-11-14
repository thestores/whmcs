<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Decorator;

use ModulesGarden\TSSPlugin\Core\Components\Enums\DisplayTypes;

class ChildrenSize extends AbstractDecorator
{
    public function fitToParent(): self
    {
        return $this->appendClass(DisplayTypes::FLEX);
    }
}