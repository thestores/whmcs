<?php

namespace ModulesGarden\TSSPlugin\Components\Card;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\BorderTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ContentTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\DescriptionTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ToolbarTrait;

class Card extends AbstractComponent
{
    use TitleTrait;
    use DescriptionTrait;
    use ContentTrait;
    use ToolbarTrait;
    use ComponentsContainerTrait;
    use CssContainerTrait;
    use BorderTrait;

    public const COMPONENT = 'Card';

    public function addToLeftSidebar($element): self
    {
        $this->addComponent('leftSidebar', $element);

        return $this;
    }

    public function addToRightSidebar($element): self
    {
        $this->addComponent('rightSidebar', $element);

        return $this;
    }
}