<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\tssmodule\App\UI\Admin\Statistics\Index\Graphs\TotalIncomeGraph;
use ModulesGarden\tssmodule\Components\Widget\Widget;


class TotalIncomeWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('trending-up');
        $graph = new TotalIncomeGraph();
        $this->addElement($graph);
    }
}