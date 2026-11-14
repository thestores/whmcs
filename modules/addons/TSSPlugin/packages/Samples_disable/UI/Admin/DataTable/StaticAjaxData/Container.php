<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\TSSPlugin\Components\Grid\Grid;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container
{
    public function loadHtml(): void
    {
        $grid = new Grid();
        $grid->setRows([

                [[new DataTable()]],
                [[new Widget()]],
            ]);
        $this->addElement($grid);
    }
}