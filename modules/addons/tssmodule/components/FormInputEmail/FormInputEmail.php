<?php

namespace ModulesGarden\tssmodule\Components\FormInputEmail;

use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;

class FormInputEmail extends FormInputText
{
    public function __construct()
    {
        parent::__construct();

        $this->setType('email');
        $this->setPlaceholder('email@example.com');
    }
}
