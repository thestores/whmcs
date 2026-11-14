<?php

namespace ModulesGarden\TSSPlugin\Components\Alert;

use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;

class AlertSuccess extends Alert
{
    public function __construct()
    {
        parent::__construct();

        $this->setType(Color::SUCCESS);
    }
}
