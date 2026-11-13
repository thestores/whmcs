<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\tssmodule\App\UI\Admin\Statistics\Index\Graphs\ProductIncomeGraph;
use ModulesGarden\tssmodule\Components\Widget\Widget;


class ProductIncomeWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('chart-bar');
        $graph = new ProductIncomeGraph();
        $this->addElement($graph);
    }
}