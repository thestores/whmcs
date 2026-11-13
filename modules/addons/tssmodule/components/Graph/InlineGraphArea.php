<?php

namespace ModulesGarden\tssmodule\Components\Graph;

use ModulesGarden\tssmodule\Components\Graph\Source\InlineGraph;

class InlineGraphArea extends InlineGraph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('area');
    }
}