<?php

namespace ModulesGarden\TSSPlugin\Components\Modal;

use ModulesGarden\TSSPlugin\Components\Button\ButtonCancel;
use ModulesGarden\TSSPlugin\Components\Button\ButtonWarning;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalClose;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalFormSubmit;

class ModalWarning extends ModalAction
{
    protected $type = self::TYPE_WARNING;

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new ButtonWarning())
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
