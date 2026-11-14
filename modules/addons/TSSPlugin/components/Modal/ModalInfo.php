<?php

namespace ModulesGarden\TSSPlugin\Components\Modal;

use ModulesGarden\TSSPlugin\Components\Button\ButtonCancel;
use ModulesGarden\TSSPlugin\Components\Button\ButtonClose;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalClose;

class ModalInfo extends ModalBase
{
    protected $actionModal = false;

 

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new ButtonClose())
                ->setTitle($this->translate('close'))
                ->onClick(new ModalClose($this))
        );
    }
}
