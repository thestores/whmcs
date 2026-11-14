<?php

namespace ModulesGarden\TSSPlugin\Components\Container;

use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ComponentContainerInterface;

/**
 * Class Form
 */
class ContainerNoWrap extends Container implements ComponentContainerInterface
{
    protected $css = 'lu-text-nowrap';
}
