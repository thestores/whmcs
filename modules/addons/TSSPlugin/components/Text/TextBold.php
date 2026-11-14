<?php

namespace ModulesGarden\TSSPlugin\Components\Text;

use ModulesGarden\TSSPlugin\Core\Components\Decorator\Decorator;

class TextBold extends Text
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->font()->setBoldWeight();
    }
}