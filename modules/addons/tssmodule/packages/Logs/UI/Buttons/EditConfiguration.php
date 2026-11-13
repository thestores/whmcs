<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Buttons;

use ModulesGarden\tssmodule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Packages\Logs\UI\Modals\EditConfigurationModal;

class EditConfiguration extends DropdownMenuItem
{
    public function loadHtml(): void
    {
        $this->setIcon('cog');
        $this->onClick(Action::modalLoad(new EditConfigurationModal()));
    }
}
