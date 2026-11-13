<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Widgets;

use ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Forms\FilterForm;
use ModulesGarden\tssmodule\Components\Grid\Grid;
use ModulesGarden\tssmodule\Components\Widget\Widget;

class FilterWidget extends Widget
{
    public function loadHtml(): void
    {
        $grid = new Grid();
        $grid->setRows(
            [
                [
                    [new FilterForm(), 6]
                ]
            ]
        );

        $this->addElement($grid);
    }
}