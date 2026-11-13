<?php

namespace ModulesGarden\tssmodule\Components\Modal;

use ModulesGarden\tssmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalFormSubmit;

class ModalSuccess extends ModalAction
{
    protected $type = self::TYPE_SUCCESS;

    protected function initActionButtons()
    {
        $this->addActionButton(
            (new \ModulesGarden\tssmodule\Components\Button\ButtonSuccess())
                ->setTitle($this->translate('submit'))
                ->onClick(new ModalFormSubmit($this))
        );

        $this->addActionButton(
            (new \ModulesGarden\tssmodule\Components\Button\ButtonCancel())
                ->setTitle($this->translate('cancel'))
                ->onClick(new ModalClose($this))
        );
    }
}
