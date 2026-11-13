<?php

namespace ModulesGarden\tssmodule\App\UI\Client\Sidebars\Buttons;

use ModulesGarden\tssmodule\App\UI\Client\Sidebars\Modals\SidebarSampleModal;
use ModulesGarden\tssmodule\Components\IconButton\IconButton;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalLoad;

class SidebarSampleButton extends IconButton
{
    public function loadHtml(): void
    {
        $this->onClick(new ModalLoad(new SidebarSampleModal()));
        $this->displayWithTitle("Open Popup");
        $this->setTitle("qwertyuikol");
    }
}