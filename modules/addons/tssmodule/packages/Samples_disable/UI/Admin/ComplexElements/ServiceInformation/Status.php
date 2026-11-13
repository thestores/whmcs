<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation;

use ModulesGarden\tssmodule\Components\Label\Label;
use ModulesGarden\tssmodule\Core\Components\Enums\Color;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxAutoReloadInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Core\UI\Interfaces\ClientArea;

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
