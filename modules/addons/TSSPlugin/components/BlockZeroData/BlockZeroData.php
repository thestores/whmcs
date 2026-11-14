<?php

namespace ModulesGarden\TSSPlugin\Components\BlockZeroData;

use ModulesGarden\TSSPlugin\App\Libs\Icons;
use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Core\Components\Traits\DescriptionTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ComponentContainerInterface;

class BlockZeroData extends Container implements ComponentContainerInterface
{
    use TitleTrait;
    use DescriptionTrait;

    public const COMPONENT = 'BlockZeroData';

    public function setIcon(string $icon): self
    {
        $this->setSlot('icon', $icon);
        // inline SVG, rendered instead of the icon class when there is one
        $this->setSlot('iconSvg', Icons::svg($icon));

        return $this;
    }
}
