<?php

namespace ModulesGarden\tssmodule\Components\IconButton;

use ModulesGarden\tssmodule\Core\Components\Enums\Color;

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
