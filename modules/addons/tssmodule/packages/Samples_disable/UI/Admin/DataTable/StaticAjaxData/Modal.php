<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\tssmodule\Components\Modal\ModalSuccess;

class Modal extends ModalSuccess
{
    public function loadHtml(): void
    {
        $this->addElement(new Form());
    }
}