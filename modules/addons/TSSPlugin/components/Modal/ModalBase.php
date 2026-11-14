<?php

namespace ModulesGarden\TSSPlugin\Components\Modal;

use ModulesGarden\TSSPlugin\Components\Button\ButtonCancel;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalClose;

class ModalBase extends Modal
{
    public function __construct()
    {
        parent::__construct();

        $this->initActionButtons();

        $this->setTitle($this->translate('title'));
    }

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new ButtonCancel())
                ->setTitle($this->translate('close'))
                ->onClick(new ModalClose($this))
        );
    }
}
