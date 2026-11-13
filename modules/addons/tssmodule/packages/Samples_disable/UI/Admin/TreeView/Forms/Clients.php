<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Forms;

use ModulesGarden\tssmodule\Components\Form\Form;

class Clients extends Form
{
    public function loadHtml(): void
    {
        $this->builder->addField(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Dropdowns\Clients());
        $this->builder->addField(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Dropdowns\Services());
    }
}