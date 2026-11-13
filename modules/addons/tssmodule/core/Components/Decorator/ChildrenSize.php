<?php

namespace ModulesGarden\tssmodule\Core\Components\Decorator;

use ModulesGarden\tssmodule\Core\Components\Enums\DisplayTypes;

class ChildrenSize extends AbstractDecorator
{
    public function fitToParent(): self
    {
        return $this->appendClass(DisplayTypes::FLEX);
    }
}