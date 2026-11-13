<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Modals;

use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ImportForm;
use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ReSyncForm;
use ModulesGarden\tssmodule\Components\Modal\Modal;
use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ReSyncModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('reSync'));
        //$this->setSize(Modal::SIZE_EXTRA_LARGE);
        $this->addElement(new ReSyncForm());
        $this->addElement((new Text())->setText($this->translate('description')));
    }
}