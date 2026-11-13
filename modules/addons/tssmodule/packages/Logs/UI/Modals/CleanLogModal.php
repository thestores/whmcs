<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Modals;

use ModulesGarden\tssmodule\Components\Modal\ModalDanger;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Logs\UI\Forms\CleanLogForm;

class CleanLogModal extends ModalDanger implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new CleanLogForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}
