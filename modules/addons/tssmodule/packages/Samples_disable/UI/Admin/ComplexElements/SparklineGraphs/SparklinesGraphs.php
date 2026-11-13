<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\SparklineGraphs;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Graphs\Graphs\SparklineGraphArea;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Graphs\Graphs\SparklineGraphLine;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Components\Grid\Grid;

class SparklinesGraphs extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $widget = new Widget();
        $widget->setTitle("Test Grafów");

        $grid = new Grid();

        $chart1       = new SparklineGraphLine();
        $chart2       = new SparklineGraphLine();
        $chart3       = new SparklineGraphArea();
        $chart4       = new SparklineGraphArea();
        $leftSection  = new Container();
        $rightSection = new Grid();

        $rightSection->setRows([
            [
                [$chart1, 6], [$chart2, 6]
            ],
            [
                [$chart3, 6], [$chart4, 6]
            ]
        ]);

        $grid->setRows([
            [
                [$leftSection, 6], [$rightSection, 6]
            ]]);

        $widget->addElement($grid);
        $this->addElement($widget);
    }
}