<?php

namespace ModulesGarden\tssmodule\Components\FormGroup;

use ModulesGarden\tssmodule\Core\Components\Decorator\Decorator;
use ModulesGarden\tssmodule\Core\Contracts\Components\FormFieldInterface;

class FormGroupThirdWidth extends FormGroup implements FormFieldInterface
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->columns()->three();
    }
}