<?php

namespace ModulesGarden\tssmodule\App\UI\Client\Sidebars;

use ModulesGarden\tssmodule\App\UI\Client\Sidebars\Buttons\SidebarSampleButton;
use ModulesGarden\tssmodule\Components\Sidebar\Sidebar;
use ModulesGarden\tssmodule\Components\SidebarItem\SidebarItem;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;

class MainSidebar extends Sidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Useless sidebar");

        $item = new SidebarItem("Logs Data Table", "https://whmcs.docker/index.php?mg-page=Home&m=tssmodule");
        $item2 = new SidebarItem("Service Information", "https://whmcs.docker/index.php?mg-page=Home&mg-action=ServiceInformation&m=tssmodule");
        $item3 = new SidebarItem("Industrial Disk", "https://whmcs.docker/index.php?mg-page=Home&m=tssmodule");
        $item4 = new SidebarItem("Servers Information");

        $item4->addElement(new SidebarSampleButton());

        $this->addItem($item);
        $this->addItem($item2);
        $this->addItem($item3);
        $this->addItem($item4);
    }
}