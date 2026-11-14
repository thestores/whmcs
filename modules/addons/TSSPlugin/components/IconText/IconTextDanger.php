<?php

namespace ModulesGarden\TSSPlugin\Components\IconText;

use ModulesGarden\TSSPlugin\Core\Components\Enums\Type;

class IconTextDanger extends IconText
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Type::DANGER);
    }
}