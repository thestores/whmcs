<?php

namespace ModulesGarden\TSSPlugin\Components\Label;

use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;

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
