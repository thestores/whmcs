<?php

namespace ModulesGarden\tssmodule\Components\Text;

use ModulesGarden\tssmodule\Core\Components\Decorator\Decorator;

class TextBold extends Text
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->font()->setBoldWeight();
    }
}