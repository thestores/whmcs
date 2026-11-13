<?php

namespace ModulesGarden\tssmodule\Components\Graph;

use ModulesGarden\tssmodule\Components\Graph\Source\GraphSimpleSeries;

class GraphDoughnut extends GraphSimpleSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('donut');
    }
}