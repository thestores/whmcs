<?php

namespace ModulesGarden\TSSPlugin\Components\OverlayComponents;

use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;

use ModulesGarden\TSSPlugin\Core\UI\Interfaces\ClientArea;

class OverlayComponents extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public const COMPONENT = 'OverlayComponents';
}
