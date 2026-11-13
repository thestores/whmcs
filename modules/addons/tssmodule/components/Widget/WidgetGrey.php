<?php

namespace ModulesGarden\tssmodule\Components\Widget;

use ModulesGarden\tssmodule\Core\Components\Decorator\Decorator;

class WidgetGrey extends Widget
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->background()->setGrey();
    }
}
