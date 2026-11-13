<?php

namespace ModulesGarden\tssmodule\Components\Badge;

use ModulesGarden\tssmodule\Core\Components\Enums\Color;

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
