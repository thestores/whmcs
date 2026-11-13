<?php

namespace ModulesGarden\tssmodule\Components\Text;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TextTrait;

class Text extends AbstractComponent
{
    use TextTrait;
    use CssContainerTrait;

    public const COMPONENT = 'Text';
}
