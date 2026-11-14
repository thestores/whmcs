<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\Modals\Forms;

use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Components\Switcher\Switcher;

class Confirm extends Form
{
    public function loadHtml(): void
    {
        $this->builder->createField(Switcher::class, 'confirm');
    }
}