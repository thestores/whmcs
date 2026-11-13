<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Buttons;

use ModulesGarden\tssmodule\Components\Button\ButtonDanger;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Packages\Logs\UI\Modals\CleanLogModal;

class CleanLogButton extends ButtonDanger
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->setIcon('delete');
        $this->setTitle($this->translate('title'));
        $this->onClick(Action::modalOpen(new CleanLogModal()));
    }
}
