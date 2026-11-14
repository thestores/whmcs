<?php

namespace ModulesGarden\TSSPlugin\Components\Hint;

class HintDefault extends Hint
{
    public function __construct()
    {
        $this->setType(self::TYPE_DEFAULT);
        parent::__construct();
    }
}