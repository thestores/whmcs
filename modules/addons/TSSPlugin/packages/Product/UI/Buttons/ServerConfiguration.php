<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\UI\Buttons;

use ModulesGarden\TSSPlugin\Components\Button\ButtonInfo;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalLoad;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Product\UI\Modals;

class ServerConfiguration extends ButtonInfo implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('button.title'));
        $this->setIcon('settings');
        $this->onClick((new ModalLoad(new Modals\ServerConfiguration())));
    }
}