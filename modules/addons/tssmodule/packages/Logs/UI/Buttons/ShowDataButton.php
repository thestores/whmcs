<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Buttons;

use ModulesGarden\tssmodule\Components\IconButton\IconButtonEdit;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Packages\Logs\UI\Modals\ShowDataModal;

class ShowDataButton extends IconButtonEdit
{
    public function loadHtml(): void
    {
        $this->setIcon('info');
        $this->onClick(Action::modalLoad(new ShowDataModal()));
    }
}
