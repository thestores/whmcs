<?php

namespace ModulesGarden\tssmodule\Components\FormLabel;

use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TextTrait;

/**
 * Class Form
 */
class FormLabel extends AbstractComponent
{
    use ComponentsContainerTrait;
    use CssContainerTrait;
    use TextTrait;

    public const COMPONENT = 'FormLabel';
}
