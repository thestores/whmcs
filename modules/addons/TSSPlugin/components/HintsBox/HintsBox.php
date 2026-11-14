<?php

namespace ModulesGarden\TSSPlugin\Components\HintsBox;

use ModulesGarden\TSSPlugin\Components\Hint\Hint;
use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ToolbarTrait;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class HintsBox extends AbstractComponent implements AdminAreaInterface
{
    use TitleTrait;
    use ToolbarTrait;
    use ComponentsContainerTrait;
    use CssContainerTrait;

    public const COMPONENT = 'HintsBox';

    public function addHint(Hint $hint): self
    {
        $this->addComponent('hints', $hint);

        return $this;
    }
}