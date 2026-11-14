<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\TSSPlugin\Components\Graph\Models\DataSet;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class SparklineGraphLineInline extends \ModulesGarden\TSSPlugin\Components\Graph\InlineGraphLine implements AdminAreaInterface
{
    public function loadHtml():void
    {
    }

    public function loadData(): void
    {
        $dataSet = new DataSet();
        $dataSet->setTitle('Data Set')
            ->setData([rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10)]);

        $this->addDataSet($dataSet);
    }
}