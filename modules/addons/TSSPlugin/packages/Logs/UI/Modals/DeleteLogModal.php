<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Modals;

use ModulesGarden\TSSPlugin\Components\Modal;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Forms\DeleteLogForm;

class DeleteLogModal extends Modal\ModalDanger implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new DeleteLogForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}
