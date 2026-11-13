<?php

namespace ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Modals;

use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Forms\EditConfigurationForm;

class EditConfigurationModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new EditConfigurationForm());
        $this->setTitle($this->translate('title'));
    }
}