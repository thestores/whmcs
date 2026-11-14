<?php

namespace ModulesGarden\TSSPlugin\App\UI\Client\Home\Index;

use ModulesGarden\TSSPlugin\App\UI\Client\Sidebars\MainSidebar;
use ModulesGarden\TSSPlugin\Components\LayoutWithSidebar\LayoutWithSidebar;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Pages\LogsDataTable;

class Container extends LayoutWithSidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $table = new LogsDataTable();
        $this->addSidebar(new MainSidebar());
        $this->addElement($table);
    }
}