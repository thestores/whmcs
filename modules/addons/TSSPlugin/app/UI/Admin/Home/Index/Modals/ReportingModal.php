<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Modals;

use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Forms\ReportingForm;
use ModulesGarden\TSSPlugin\Components\Modal\Modal;
use ModulesGarden\TSSPlugin\Components\Modal\ModalEdit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class ReportingModal extends Modal implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('sendReport'));
        $this->addElement(new ReportingForm());
    }
}