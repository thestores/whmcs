<?php

namespace ModulesGarden\tssmodule\Components\ProgressBar;

use ModulesGarden\tssmodule\Core\Components\Enums\BackgroundColor;

class ProgressBarDanger extends ProgressBar
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(BackgroundColor::DANGER);
    }
}