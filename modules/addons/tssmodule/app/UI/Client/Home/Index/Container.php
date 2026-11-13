<?php

namespace ModulesGarden\tssmodule\App\UI\Client\Home\Index;

use ModulesGarden\tssmodule\App\UI\Client\Sidebars\MainSidebar;
use ModulesGarden\tssmodule\Components\LayoutWithSidebar\LayoutWithSidebar;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Packages\Logs\UI\Pages\LogsDataTable;

class Container extends LayoutWithSidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $table = new LogsDataTable();
        $this->addSidebar(new MainSidebar());
        $this->addElement($table);
    }
}