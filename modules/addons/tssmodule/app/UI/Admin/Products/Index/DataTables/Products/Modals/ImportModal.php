<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Modals;

use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ImportForm;
use ModulesGarden\tssmodule\Components\Modal\Modal;
use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ImportModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setSize(Modal::SIZE_EXTRA_LARGE);
        $this->addElement(new ImportForm());
    }
}