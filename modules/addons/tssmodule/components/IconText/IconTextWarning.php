<?php

namespace ModulesGarden\tssmodule\Components\IconText;

use ModulesGarden\tssmodule\Core\Components\Enums\Type;

class IconTextWarning extends IconText
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Type::WARNING);
    }
}