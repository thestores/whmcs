<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Modals;

use ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Forms\ResetTaskForm;
use ModulesGarden\TSSPlugin\Components\Modal\ModalWarning;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class ResetTaskModal extends ModalWarning implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ResetTaskForm());
        $this->setTitle($this->translate('title'));
        $this->setContent($this->translate('description'));
    }
}
