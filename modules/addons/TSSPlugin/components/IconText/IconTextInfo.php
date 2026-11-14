<?php

namespace ModulesGarden\TSSPlugin\Components\IconText;

use ModulesGarden\TSSPlugin\Core\Components\Enums\Type;

class IconTextInfo extends IconText
{
    public function __construct()
    {
        parent::__construct();
        $this->setType(Type::INFO);
    }
}