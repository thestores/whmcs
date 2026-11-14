<?php

namespace ModulesGarden\TSSPlugin\Components\Text;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TextTrait;

class Text extends AbstractComponent
{
    use TextTrait;
    use CssContainerTrait;

    public const COMPONENT = 'Text';
}
