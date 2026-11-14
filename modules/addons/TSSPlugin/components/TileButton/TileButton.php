<?php

namespace ModulesGarden\TSSPlugin\Components\TileButton;

use ModulesGarden\TSSPlugin\Components\Button\Button;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ImageTrait;

/**
 * Class IconButton
 */
class TileButton extends Button
{
    use ImageTrait;

    public const COMPONENT = 'TileButton';

    public function setActive(bool $active = true): self
    {
        $this->setSlot('active', $active);

        return $this;
    }
}
