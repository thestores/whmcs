<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\TSSPlugin\Components\Graph\Models\DataSet;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class SparklineGraphLine extends \ModulesGarden\TSSPlugin\Components\Graph\SparklineGraphLine implements AdminAreaInterface
{
    public function loadHtml():void
    {
        $this->setTitle("Dobry tytuł");
        $this->setSubTitle("Nie gorszy pod tytuł");
    }

    public function loadData(): void
    {
        $dataSet = new DataSet();
        $dataSet->setTitle('Data Set')
            ->setData([rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10), rand(0, 10)]);

        $this->addDataSet($dataSet);
    }
}