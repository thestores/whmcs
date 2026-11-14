<?php

namespace ModulesGarden\TSSPlugin\Components\Graph;

use ModulesGarden\TSSPlugin\Components\Graph\Source\SparklineGraph;

class SparklineGraphArea extends SparklineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType("area");
    }
}