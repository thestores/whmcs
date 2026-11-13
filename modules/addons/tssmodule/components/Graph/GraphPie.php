<?php

namespace ModulesGarden\tssmodule\Components\Graph;

use ModulesGarden\tssmodule\Components\Graph\Source\GraphSimpleSeries;

class GraphPie extends GraphSimpleSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('pie');
    }
}
