<?php

namespace ModulesGarden\tssmodule\Components\Alert;

use ModulesGarden\tssmodule\Core\Components\Enums\Color;

class AlertDanger extends Alert
{
    public function __construct()
    {
        parent::__construct();

        $this->setType(Color::DANGER);
    }
}
