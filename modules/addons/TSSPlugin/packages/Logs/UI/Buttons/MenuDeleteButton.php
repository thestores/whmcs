<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Buttons;

use ModulesGarden\TSSPlugin\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Modals\MenuDeleteModal;

class MenuDeleteButton extends DropdownMenuItem
{
    public function loadHtml(): void
    {
        $this->setIcon('delete');
        $this->onClick(Action::modalLoad(new MenuDeleteModal()));
    }
}