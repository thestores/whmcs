<?php

namespace ModulesGarden\TSSPlugin\App\UI\Client\Sidebars\Buttons;

use ModulesGarden\TSSPlugin\App\UI\Client\Sidebars\Modals\SidebarSampleModal;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButton;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalLoad;

class SidebarSampleButton extends IconButton
{
    public function loadHtml(): void
    {
        $this->onClick(new ModalLoad(new SidebarSampleModal()));
        $this->displayWithTitle("Open Popup");
        $this->setTitle("qwertyuikol");
    }
}