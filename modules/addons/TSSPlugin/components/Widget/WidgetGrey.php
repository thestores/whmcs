<?php

namespace ModulesGarden\TSSPlugin\Components\Widget;

use ModulesGarden\TSSPlugin\Core\Components\Decorator\Decorator;

class WidgetGrey extends Widget
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->background()->setGrey();
    }
}
