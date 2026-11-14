<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\Buttons;

use ModulesGarden\TSSPlugin\Components\IconButton\IconButton;

class ButtonEdit extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setIcon('pencil');
    }
}