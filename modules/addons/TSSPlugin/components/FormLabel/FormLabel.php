<?php

namespace ModulesGarden\TSSPlugin\Components\FormLabel;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TextTrait;

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
