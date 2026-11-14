<?php

namespace ModulesGarden\TSSPlugin\Components\ProgressBar;

use ModulesGarden\TSSPlugin\Core\Components\Enums\BackgroundColor;

class ProgressBarInfo extends ProgressBar
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(BackgroundColor::INFO);
    }
}