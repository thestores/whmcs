<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Modals;

use ModulesGarden\TSSPlugin\Components\Modal\ModalEdit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class Clients extends ModalEdit implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Forms\Clients());
    }
}