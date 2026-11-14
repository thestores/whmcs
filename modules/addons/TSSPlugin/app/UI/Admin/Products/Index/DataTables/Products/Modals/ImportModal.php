<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Products\Index\DataTables\Products\Modals;

use ModulesGarden\TSSPlugin\App\UI\Admin\Products\Index\DataTables\Products\Forms\ImportForm;
use ModulesGarden\TSSPlugin\Components\Modal\Modal;
use ModulesGarden\TSSPlugin\Components\Modal\ModalEdit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class ImportModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setSize(Modal::SIZE_EXTRA_LARGE);
        $this->addElement(new ImportForm());
    }
}