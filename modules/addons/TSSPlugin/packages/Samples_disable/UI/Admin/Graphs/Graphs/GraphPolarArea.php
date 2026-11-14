<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\TSSPlugin\Components\Graph\Series\SimpleSeries;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class GraphPolarArea extends \ModulesGarden\TSSPlugin\Components\Graph\GraphPolarArea implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        parent::loadHtml();
        $this->setTitle('Graph Polar Area');
    }

    public function loadData(): void
    {
        $this->setLabels(['day 1', 'day 2', 'day 3', 'day 4', 'day 5', 'day 6', 'day 7', 'day 8']);

        for ($i = 1 ; $i <= 8 ; $i++)
        {
            $this->addSeries(new SimpleSeries(rand(0, 10)));
        }
    }
}
