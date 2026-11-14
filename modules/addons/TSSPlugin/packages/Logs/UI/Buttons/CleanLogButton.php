<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Buttons;

use ModulesGarden\TSSPlugin\Components\Button\ButtonDanger;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Modals\CleanLogModal;

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
