<?php

namespace ModulesGarden\tssmodule\Components\Label;

use ModulesGarden\tssmodule\Core\Components\Enums\Color;

/**
 * Class Form
 */
class LabelDanger extends Label
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Color::DANGER);
    }
}
