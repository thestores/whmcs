<?php

namespace ModulesGarden\tssmodule\Components\Graph;

class GraphArea extends Graph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('area');
    }
}