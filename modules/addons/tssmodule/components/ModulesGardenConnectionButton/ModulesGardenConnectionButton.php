<?php

namespace ModulesGarden\tssmodule\Components\ModulesGardenConnectionButton;

use ModulesGarden\tssmodule\Core\Components\Traits\TextTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\UrlTrait;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Core\Components\Traits\ActionOnClickTrait;

class ModulesGardenConnectionButton extends Container
{
    use ActionOnClickTrait;
    use UrlTrait;
    use TextTrait;

    public const COMPONENT = 'ModulesGardenConnectionButton';
}
