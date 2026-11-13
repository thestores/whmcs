<?php

namespace ModulesGarden\tssmodule\Components\Grid;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\Row\Row;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Components\Decorator\Decorator;
use ModulesGarden\tssmodule\Core\Components\Traits\AjaxTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\CssContainerTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\ComponentContainerInterface;

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
