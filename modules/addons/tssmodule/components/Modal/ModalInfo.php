<?php

namespace ModulesGarden\tssmodule\Components\Modal;

use ModulesGarden\tssmodule\Components\Button\ButtonCancel;
use ModulesGarden\tssmodule\Components\Button\ButtonClose;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalClose;

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
