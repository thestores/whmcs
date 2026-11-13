<?php

namespace ModulesGarden\tssmodule\Components\Button;

class ButtonSubmitSuccess extends ButtonSuccess
{
    public function __construct()
    {
        parent::__construct();

        $this->setType(self::TYPE_SUBMIT);
    }
}
