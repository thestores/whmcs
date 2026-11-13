<?php

namespace ModulesGarden\tssmodule\Components\Tagger;

use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;

class Tagger extends Dropdown
{
    public function __construct()
    {
        parent::__construct();

        $this->setMultiple(true);
        $this->setAllowToCreate(true);
    }
}
