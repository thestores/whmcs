<?php

namespace ModulesGarden\TSSPlugin\Components\FormGroup;

use ModulesGarden\TSSPlugin\Core\Components\Decorator\Decorator;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\FormFieldInterface;

class FormGroupQuarterWidth extends FormGroup implements FormFieldInterface
{
    public function __construct()
    {
        parent::__construct();

        (new Decorator($this))->columns()->four();
    }
}
