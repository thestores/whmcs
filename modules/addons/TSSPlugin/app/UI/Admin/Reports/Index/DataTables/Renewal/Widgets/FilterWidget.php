<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\Renewal\Widgets;

use ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\Renewal\Forms\FilterForm;
use ModulesGarden\TSSPlugin\Components\Grid\Grid;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;

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