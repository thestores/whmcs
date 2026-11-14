<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Modals;

use ModulesGarden\TSSPlugin\Components\Modal\ModalDanger;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Forms\MassDeleteForm;

class MassDeleteModal extends ModalDanger implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new MassDeleteForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}