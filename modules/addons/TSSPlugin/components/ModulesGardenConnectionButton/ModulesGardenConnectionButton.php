<?php

namespace ModulesGarden\TSSPlugin\Components\ModulesGardenConnectionButton;

use ModulesGarden\TSSPlugin\Core\Components\Traits\TextTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\UrlTrait;
use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ActionOnClickTrait;

class ModulesGardenConnectionButton extends Container
{
    use ActionOnClickTrait;
    use UrlTrait;
    use TextTrait;

    public const COMPONENT = 'ModulesGardenConnectionButton';
}
