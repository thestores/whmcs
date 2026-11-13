<?php

namespace ModulesGarden\tssmodule\Components\Graph;

use ModulesGarden\tssmodule\Components\Graph\Source\SparklineGraph;

class SparklineGraphArea extends SparklineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType("area");
    }
}