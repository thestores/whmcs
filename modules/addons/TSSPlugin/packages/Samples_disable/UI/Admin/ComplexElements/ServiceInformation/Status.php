<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation;

use ModulesGarden\TSSPlugin\Components\Label\Label;
use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxAutoReloadInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Core\UI\Interfaces\ClientArea;

class Status extends Label implements AjaxOnLoadInterface, AjaxAutoReloadInterface, AdminAreaInterface, ClientAreaInterface
{
    public function loadData(): void
    {
        $types = [
            Color::DANGER,
            Color::INFO,
            Color::SUCCESS,
            Color::WARNING,
        ];

        $type = $types[rand(0, 3)];
        $this->setType($type);
        $this->setText($type);
        $this->displayAsStatusLabel(rand(0, 1));
    }

    public function loadHtml(): void
    {
        $this->setText('Loading...');
    }
}
