<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Modals;

use ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Forms\ReportingForm;
use ModulesGarden\tssmodule\Components\Modal\Modal;
use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ReportingModal extends Modal implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('sendReport'));
        $this->addElement(new ReportingForm());
    }
}