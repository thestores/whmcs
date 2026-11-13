<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Buttons;

use ModulesGarden\tssmodule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Packages\Logs\UI\Modals\ExportCsvModal;

class ExportCsvButton extends DropdownMenuItem
{
    public function loadHtml(): void
    {
        $this->setIcon('upload');
        $this->onClick(Action::modalLoad(new ExportCsvModal()));
    }
}