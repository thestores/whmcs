<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\Modals\Forms;

use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;

class Confirm extends Form
{
    public function loadHtml(): void
    {
        $this->builder->createField(Switcher::class, 'confirm');
    }
}