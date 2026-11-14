<?php

namespace ModulesGarden\TSSPlugin\Components\TextShowHide;

use ModulesGarden\TSSPlugin\Components\Container\Container;

class TextShowHide extends Container
{
    public const COMPONENT = 'TextShowHide';

    public function setText(string $text): self
    {
        $this->setSlot('text', $text);

        return $this;
    }
}
