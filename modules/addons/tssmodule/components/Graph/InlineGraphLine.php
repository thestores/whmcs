<?php

namespace ModulesGarden\tssmodule\Components\Graph;

use ModulesGarden\tssmodule\Components\Graph\Source\InlineGraph;

class InlineGraphLine extends InlineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('line');
    }
}