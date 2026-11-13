<?php

namespace ModulesGarden\tssmodule\Components\BlockZeroData;

use ModulesGarden\tssmodule\App\Libs\Icons;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Core\Components\Traits\DescriptionTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TitleTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\ComponentContainerInterface;

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
