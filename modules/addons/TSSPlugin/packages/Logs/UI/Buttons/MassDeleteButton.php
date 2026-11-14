<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Buttons;

use ModulesGarden\TSSPlugin\Components\IconButton\IconButtonDelete;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Modals\MassDeleteModal;

class MassDeleteButton extends IconButtonDelete
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->displayWithTitle($this->translate('DeleteMass'));
        $this->onClick(Action::modalOpen(new MassDeleteModal()));
    }
}