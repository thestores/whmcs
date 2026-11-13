<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Modals;

use ModulesGarden\tssmodule\Components\Modal;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Logs\UI\Forms\DeleteLogForm;

class DeleteLogModal extends Modal\ModalDanger implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new DeleteLogForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}
