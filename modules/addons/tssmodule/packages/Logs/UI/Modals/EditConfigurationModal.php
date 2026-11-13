<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Modals;

use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Logs\UI\Forms\EditConfigurationForm;

class EditConfigurationModal extends ModalEdit implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new EditConfigurationForm());
        $this->setTitle($this->translate('title'));
    }
}
