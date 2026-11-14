<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\Modals;

use ModulesGarden\TSSPlugin\Components\Modal\Modal;
use ModulesGarden\TSSPlugin\Components\Modal\ModalEdit;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\Forms\SwitchersForm;

class SwitchersModal extends ModalEdit
{
    public function loadHtml(): void
    {
        $this->addElement(new SwitchersForm());
        $this->setSize(Modal::SIZE_LARGE);
    }
}