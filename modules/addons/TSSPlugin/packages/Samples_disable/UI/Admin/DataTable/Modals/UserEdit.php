<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Modals;

use ModulesGarden\TSSPlugin\Components\Modal;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class UserEdit extends Modal\ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Forms\UserEdit());
    }
}
