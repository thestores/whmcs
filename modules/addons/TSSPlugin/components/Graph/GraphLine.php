<?php

namespace ModulesGarden\TSSPlugin\Components\Graph;

class GraphLine extends Graph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('line');
    }
}
