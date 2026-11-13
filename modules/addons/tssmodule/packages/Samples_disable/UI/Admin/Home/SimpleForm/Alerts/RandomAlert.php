<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Home\SimpleForm\Alerts;

use ModulesGarden\tssmodule\Components\Alert\Alert;
use ModulesGarden\tssmodule\Core\Components\Enums\Color;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;


class RandomAlert extends Alert implements AdminAreaInterface
{
    public function loadData(): void
    {
        $colors = [
            Color::DANGER,
            Color::INFO,
            Color::PRIMARY,
            Color::SUCCESS,
            Color::WARNING,
        ];
        $this->setType($colors[rand(0, 4)]);
    }

    public function loadHtml(): void
    {
        $this->setText('This is some text');
    }
}
