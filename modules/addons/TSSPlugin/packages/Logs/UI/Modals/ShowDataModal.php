<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Modals;

use ModulesGarden\TSSPlugin\Components\Modal\ModalBase;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Forms\ShowDataForm;

class ShowDataModal extends ModalBase implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ShowDataForm());
        $this->setTitle($this->translate('title'));
    }
}
