<?php

namespace ModulesGarden\TSSPlugin\Components\IconButton;

use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;

/**
 * Class IconButton
 */
class IconButtonSuccess extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Color::SUCCESS);
    }
}
