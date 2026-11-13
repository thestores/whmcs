<?php

namespace ModulesGarden\tssmodule\Components\Modal;

use ModulesGarden\tssmodule\Components\Button\ButtonCancel;
use ModulesGarden\tssmodule\Components\Button\ButtonWarning;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalFormSubmit;

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
