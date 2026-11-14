<?php

namespace ModulesGarden\TSSPlugin\App\UI\Client\Home\ServiceInformation;

use ModulesGarden\TSSPlugin\App\UI\Client\Sidebars\MainSidebar;
use ModulesGarden\TSSPlugin\Components\LayoutWithSidebar\LayoutWithSidebar;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation\ServiceInformation;

class Container extends LayoutWithSidebar implements ClientAreaInterface
{
    public function loadHtml(): void
    {
        $table = new ServiceInformation();
        $this->addSidebar(new MainSidebar());
        $this->addElement($table);
    }
}