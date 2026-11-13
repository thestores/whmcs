<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons;

use ModulesGarden\tssmodule\Components\IconButton\IconButton;

class ButtonDomain extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setIcon('globe-alt');
    }
}