<?php

namespace ModulesGarden\tssmodule\Components\IconButton;

use ModulesGarden\tssmodule\Core\Components\Enums\Color;

/**
 * Class IconButton
 */
class IconButtonInfo extends IconButton
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Color::INFO);
    }
}
