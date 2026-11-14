<?php

namespace ModulesGarden\TSSPlugin\Components\Graph;

use ModulesGarden\TSSPlugin\Components\Graph\Source\InlineGraph;

class InlineGraphLine extends InlineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('line');
    }
}