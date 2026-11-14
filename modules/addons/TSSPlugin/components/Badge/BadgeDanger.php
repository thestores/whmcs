<?php

namespace ModulesGarden\TSSPlugin\Components\Badge;

use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;

/**
 * Class Form
 */
class BadgeDanger extends Badge
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Color::DANGER);
    }
}
