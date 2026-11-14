<?php

namespace ModulesGarden\TSSPlugin\Components\BoardColumn;

use ModulesGarden\TSSPlugin\Components\Container\Container;

class BoardColumn extends Container
{
    public const COMPONENT = 'BoardColumn';

    public function setName(string $name): self
    {
        $this->setSlot('name', $name);

        return $this;
    }
}
