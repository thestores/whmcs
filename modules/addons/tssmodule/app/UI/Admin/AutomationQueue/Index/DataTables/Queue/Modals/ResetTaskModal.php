<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Modals;

use ModulesGarden\tssmodule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Forms\ResetTaskForm;
use ModulesGarden\tssmodule\Components\Modal\ModalWarning;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ResetTaskModal extends ModalWarning implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ResetTaskForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}
