<?php

namespace ModulesGarden\tssmodule\Components\TileButton;

use ModulesGarden\tssmodule\Components\Button\Button;
use ModulesGarden\tssmodule\Core\Components\Traits\ImageTrait;

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
