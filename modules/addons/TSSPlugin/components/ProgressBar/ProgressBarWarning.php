<?php

namespace ModulesGarden\TSSPlugin\Components\ProgressBar;

use ModulesGarden\TSSPlugin\Core\Components\Enums\BackgroundColor;

class ProgressBarWarning extends ProgressBar
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(BackgroundColor::WARNING);
    }
}