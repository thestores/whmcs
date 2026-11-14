<?php

namespace ModulesGarden\TSSPlugin\Components\Tagger;

use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;

class Tagger extends Dropdown
{
    public function __construct()
    {
        parent::__construct();

        $this->setMultiple(true);
        $this->setAllowToCreate(true);
    }
}
