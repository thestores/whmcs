<?php

namespace ModulesGarden\TSSPlugin\Components\Graph;

use ModulesGarden\TSSPlugin\Components\Graph\Source\GraphExtendedSeries;

class GraphRadar extends GraphExtendedSeries
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('radar');
    }
}
