<?php

namespace ModulesGarden\tssmodule\Components\Graph;

use ModulesGarden\tssmodule\Components\Graph\Source\GraphExtendedSeries;

class GraphRadar extends GraphExtendedSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('radar');
    }
}
