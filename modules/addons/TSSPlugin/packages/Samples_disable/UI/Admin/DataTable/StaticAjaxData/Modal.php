<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\TSSPlugin\Components\Modal\ModalSuccess;

class Modal extends ModalSuccess
{
    public function loadHtml(): void
    {
        $this->addElement(new Form());
    }
}