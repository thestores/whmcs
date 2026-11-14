<?php

namespace ModulesGarden\TSSPlugin\Components\Row;

use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\AjaxTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ComponentContainerInterface;

class Row extends AbstractComponent implements ComponentContainerInterface
{
    use AjaxTrait;
    use ComponentsContainerTrait;
    use CssContainerTrait;

    public const COMPONENT = 'Row';
}
