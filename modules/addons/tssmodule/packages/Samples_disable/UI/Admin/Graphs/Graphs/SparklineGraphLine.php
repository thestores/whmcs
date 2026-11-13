<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Graphs\Graphs;

use ModulesGarden\tssmodule\Components\Graph\Models\DataSet;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;

class SparklineGraphLine extends \ModulesGarden\tssmodule\Components\Graph\SparklineGraphLine implements AdminAreaInterface
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