<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Modals;

use ModulesGarden\tssmodule\Components\Modal\ModalDanger;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Logs\UI\Forms\MenuDeleteForm;

class MenuDeleteModal extends ModalDanger implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new MenuDeleteForm());
        $this->setTitle($this->translate('title'));
    }
}