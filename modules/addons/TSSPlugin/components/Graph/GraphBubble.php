<?php

namespace ModulesGarden\TSSPlugin\Components\Graph;

class GraphBubble extends Graph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('bubble');
    }
}
