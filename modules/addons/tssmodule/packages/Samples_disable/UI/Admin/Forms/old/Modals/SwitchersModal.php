<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Modals;

use ModulesGarden\tssmodule\Components\Modal\Modal;
use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Forms\SwitchersForm;

class SwitchersModal extends ModalEdit
{
    public function loadHtml(): void
    {
        $this->addElement(new SwitchersForm());
        $this->setSize(Modal::SIZE_LARGE);
    }
}