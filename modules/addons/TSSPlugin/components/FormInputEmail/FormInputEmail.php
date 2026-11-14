<?php

namespace ModulesGarden\TSSPlugin\Components\FormInputEmail;

use ModulesGarden\TSSPlugin\Components\FormInputText\FormInputText;

class FormInputEmail extends FormInputText
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('email');
        $this->setPlaceholder('email@example.com');
    }
}
