<?php

namespace ModulesGarden\tssmodule\Components\IconButton;

use ModulesGarden\tssmodule\Core\Components\Enums\Color;

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
