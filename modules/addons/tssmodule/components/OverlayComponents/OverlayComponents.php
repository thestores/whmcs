<?php

namespace ModulesGarden\tssmodule\Components\OverlayComponents;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;

use ModulesGarden\tssmodule\Core\UI\Interfaces\ClientArea;

class OverlayComponents extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public const COMPONENT = 'OverlayComponents';
}
