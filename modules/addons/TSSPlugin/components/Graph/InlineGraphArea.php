<?php

namespace ModulesGarden\TSSPlugin\Components\Graph;

use ModulesGarden\TSSPlugin\Components\Graph\Source\InlineGraph;

class InlineGraphArea extends InlineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('area');
    }
}