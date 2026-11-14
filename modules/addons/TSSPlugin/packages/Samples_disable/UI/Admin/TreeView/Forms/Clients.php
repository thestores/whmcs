<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Forms;

use ModulesGarden\TSSPlugin\Components\Form\Form;

class Clients extends Form
{
    public function loadHtml(): void
    {
        $this->builder->addField(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Dropdowns\Clients());
        $this->builder->addField(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Dropdowns\Services());
    }
}