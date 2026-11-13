<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Modals;

use ModulesGarden\tssmodule\Components\Modal\ModalBase;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Logs\UI\Forms\ShowDataForm;

class ShowDataModal extends ModalBase implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ShowDataForm());
        $this->setTitle($this->translate('title'));
    }
}
