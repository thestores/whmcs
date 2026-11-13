<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\tssmodule\Components\Graph\Models\DataSet;
use ModulesGarden\tssmodule\Components\Graph\Series\ExtendedSeries;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;

class GraphArea extends \ModulesGarden\tssmodule\Components\Graph\GraphArea implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->setTitle("Graph Area");
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
