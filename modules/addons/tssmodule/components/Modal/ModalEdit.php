<?php

namespace ModulesGarden\tssmodule\Components\Modal;

use ModulesGarden\tssmodule\Components\Button\ButtonCancel;
use ModulesGarden\tssmodule\Components\Button\ButtonSuccess;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalFormSubmit;

class ModalEdit extends ModalBase
{
    protected $actionModal = false;

 

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new ButtonSuccess())
                ->setTitle($this->translate('submit'))
                ->onClick(new ModalFormSubmit($this))
        );

        $this->addActionButton(
            (new ButtonCancel())
                ->setTitle($this->translate('cancel'))
                ->onClick(new ModalClose($this))
        );
    }
}
