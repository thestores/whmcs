<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\tssmodule\Components\Graph\Series\ExtendedSeries;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;

class GraphRadar extends \ModulesGarden\tssmodule\Components\Graph\GraphRadar implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        parent::loadHtml();
        $this->setTitle('Graph Radar');
    }

    public function loadData(): void
    {
        $this->setLabels(['day 1', 'day 2', 'day 3']);

        for ($i = 1 ; $i <= 3 ; $i++)
        {
            $this->addSeries(new ExtendedSeries('Data Set ' . $i, [rand(0, 10), rand(0, 10), rand(0, 10)]));
        }
    }
}
