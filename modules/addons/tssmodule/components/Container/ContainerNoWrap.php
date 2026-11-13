<?php

namespace ModulesGarden\tssmodule\Components\Container;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Core\Contracts\Components\ComponentContainerInterface;

/**
 * Class Form
 */
class ContainerNoWrap extends Container implements ComponentContainerInterface
{
    protected $css = 'lu-text-nowrap';
}
