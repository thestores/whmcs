<?php

namespace ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Buttons;

use ModulesGarden\tssmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;

class HideButton extends ExpandButton implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setIcon('chevron-up');
        $this->onClick((new ReloadById($this->widgetId))->withParams(["expand" => 0]));
    }
}