<?php

namespace ModulesGarden\TSSPlugin\Components\FormGroup;

use ModulesGarden\TSSPlugin\Core\Components\Decorator\Decorator;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\FormFieldInterface;

class FormGroupFullWidth extends FormGroup implements FormFieldInterface
{
    public function __construct()
    {
        parent::__construct();

        /*(new Decorator($this))->columns()->one();*/
    }
}
