<?php

namespace ModulesGarden\tssmodule\Components\Label;

use ModulesGarden\tssmodule\Core\Components\Enums\Color;

/**
 * Class Form
 */
class LabelWarning extends Label
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Color::WARNING);
    }
}
