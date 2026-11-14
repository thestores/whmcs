<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Graphs\ProductIncomeGraph;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;


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