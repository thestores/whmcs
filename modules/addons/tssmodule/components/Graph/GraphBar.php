<?php

namespace ModulesGarden\tssmodule\Components\Graph;

class GraphBar extends Graph
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('bar');
    }
}
