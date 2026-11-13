<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Modals;

use ModulesGarden\tssmodule\Components\Modal;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class UserDelete extends Modal\ModalDanger implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Forms\UserDelete());
        $this->setContent($this->translate('content'));
    }
}
