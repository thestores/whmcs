<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Modals;

use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class Clients extends ModalEdit implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Forms\Clients());
    }
}