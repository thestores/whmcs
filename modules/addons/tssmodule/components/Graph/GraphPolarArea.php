<?php

namespace ModulesGarden\tssmodule\Components\Graph;

use ModulesGarden\tssmodule\Components\Graph\Source\GraphSimpleSeries;

class GraphPolarArea extends GraphSimpleSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('polarArea');
    }
}
