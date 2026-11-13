<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons;

use ModulesGarden\tssmodule\Components\IconButton\IconButton;

class ButtonTime extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setIcon('time-restore');
    }
}