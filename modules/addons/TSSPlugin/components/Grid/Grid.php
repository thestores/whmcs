<?php

namespace ModulesGarden\TSSPlugin\Components\Grid;

use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Components\Row\Row;
use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Decorator\Decorator;
use ModulesGarden\TSSPlugin\Core\Components\Traits\AjaxTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ComponentContainerInterface;

/**
 * Class Form
 */
class Grid extends AbstractComponent implements ComponentContainerInterface
{
    use AjaxTrait;
    use ComponentsContainerTrait
    {
        addElement as protected baseAddElement;
    }
    use CssContainerTrait;

    public const COMPONENT = 'Grid';

    public function setRows(array $rows)
    {
        foreach ($rows as $items)
        {
            $row = new Row();
            foreach ($items as $item)
            {
                $realItem  = is_array($item) ? $item[0] : $item;
                $container = new Container();
                $container->addElement($realItem);

                !empty($item[1]) ? (new Decorator($container))->columns()->byColumnsNumber($item[1]) : (new Decorator($container))->columns()->default();

                $row->addElement($container);
            }

            $this->addElement($row);
        }
    }
}
