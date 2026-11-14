<?php

namespace ModulesGarden\TSSPlugin\Fragments\ConfigurableHintBox\UI\Buttons;

use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadById;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class HideButton extends ExpandButton implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setIcon('chevron-up');
        $this->onClick((new ReloadById($this->widgetId))->withParams(["expand" => 0]));
    }
}