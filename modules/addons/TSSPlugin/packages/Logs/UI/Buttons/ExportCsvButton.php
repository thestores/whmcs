<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Buttons;

use ModulesGarden\TSSPlugin\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Modals\ExportCsvModal;

class ExportCsvButton extends DropdownMenuItem
{
    public function loadHtml(): void
    {
        $this->setIcon('upload');
        $this->onClick(Action::modalLoad(new ExportCsvModal()));
    }
}