<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Buttons;

use ModulesGarden\TSSPlugin\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Modals\EditConfigurationModal;

class EditConfiguration extends DropdownMenuItem
{
    public function loadHtml(): void
    {
        $this->setIcon('cog');
        $this->onClick(Action::modalLoad(new EditConfigurationModal()));
    }
}
