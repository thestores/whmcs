<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\tssmodule\Components\Grid\Grid;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container
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