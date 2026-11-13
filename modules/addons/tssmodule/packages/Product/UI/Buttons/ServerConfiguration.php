<?php

namespace ModulesGarden\tssmodule\Packages\Product\UI\Buttons;

use ModulesGarden\tssmodule\Components\Button\ButtonInfo;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalLoad;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Product\UI\Modals;

class ServerConfiguration extends ButtonInfo implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('button.title'));
        $this->setIcon('settings');
        $this->onClick((new ModalLoad(new Modals\ServerConfiguration())));
    }
}