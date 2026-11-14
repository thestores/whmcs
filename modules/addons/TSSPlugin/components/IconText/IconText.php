<?php

namespace ModulesGarden\TSSPlugin\Components\IconText;

use ModulesGarden\TSSPlugin\Components\Icon\Icon;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TextTrait;

/**
 * Class IconButton
 */
class IconText extends Icon
{
    use TextTrait;

    public const COMPONENT = 'IconText';

    public function setLeftTextPosition(bool $leftTextPosition = true):self
    {
        $this->setSlot('leftTextPosition', $leftTextPosition);

        return $this;
    }

    public function setType(string $type):self
    {
        $this->setSlot('type', $type);

        return $this;
    }
}
