<?php

namespace ModulesGarden\TSSPlugin\Components\Modal;

use ModulesGarden\TSSPlugin\Components\Button\ButtonCancel;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSuccess;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalClose;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalFormSubmit;

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
