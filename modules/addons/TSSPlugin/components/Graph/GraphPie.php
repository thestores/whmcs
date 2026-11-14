<?php

namespace ModulesGarden\TSSPlugin\Components\Graph;

use ModulesGarden\TSSPlugin\Components\Graph\Source\GraphSimpleSeries;

class GraphPie extends GraphSimpleSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('pie');
    }
}
