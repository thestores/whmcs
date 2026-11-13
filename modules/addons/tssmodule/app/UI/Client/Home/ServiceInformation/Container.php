<?php

namespace ModulesGarden\tssmodule\App\UI\Client\Home\ServiceInformation;

use ModulesGarden\tssmodule\App\UI\Client\Sidebars\MainSidebar;
use ModulesGarden\tssmodule\Components\LayoutWithSidebar\LayoutWithSidebar;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation\ServiceInformation;

class Container extends LayoutWithSidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $table = new ServiceInformation();
        $this->addSidebar(new MainSidebar());
        $this->addElement($table);
    }
}