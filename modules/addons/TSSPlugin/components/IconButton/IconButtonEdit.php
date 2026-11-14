<?php

namespace ModulesGarden\TSSPlugin\Components\IconButton;

use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;

/**
 * Class IconButton
 */
class IconButtonEdit extends IconButtonPrimary
{
    public function __construct()
    {
        parent::__construct();
        $this->setIcon('pencil');
    }
}
