<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Buttons;

use ModulesGarden\tssmodule\Components\IconButton\IconButtonDelete;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Packages\Logs\UI\Modals\MassDeleteModal;

class MassDeleteButton extends IconButtonDelete
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->displayWithTitle($this->translate('DeleteMass'));
        $this->onClick(Action::modalOpen(new MassDeleteModal()));
    }
}