<?php

namespace ModulesGarden\TSSPlugin\Fragments\ConfigurableHintBox\UI\Widgets;

use ModulesGarden\TSSPlugin\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\TSSPlugin\Components\HintsBox\HintsBox;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ToolbarTrait;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Data\Container;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Fragments\ConfigurableHintBox\UI\Buttons\EditConfiguration;
use ModulesGarden\TSSPlugin\Fragments\ConfigurableHintBox\UI\Buttons\ExpandButton;
use ModulesGarden\TSSPlugin\Fragments\ConfigurableHintBox\UI\Buttons\HideButton;
use ModulesGarden\TSSPlugin\Packages\ModuleSettings\Support\Facades\ModuleSettings;

class ConfigurableHintBox extends HintsBox implements AjaxComponentInterface, AdminAreaInterface
{
    use ToolbarTrait;

    protected bool $hideHintBox = false;
    protected bool $expandHintBox = false;

    public function preLoadHtml(): void
    {
        $burger = new DropdownMenu();
        $burger->addItem(new EditConfiguration($this->getId()));

        $this->hideHintBox = ModuleSettings::get('hideHintBox-' . $this->getId(), false);
        $this->expandHintBox = (new Container(Request::get('ajaxData', [])))->get('expand', false);

        if ($this->hideHintBox)
        {
            $button = ($this->hideHintBox && $this->expandHintBox) ?
                new HideButton($this->getId()) :
                new ExpandButton($this->getId());

            $this->addToToolbar($button);
        }

        $this->addToToolbar($burger);
    }

    public function postLoadHtml(): void
    {
        if ($this->hideHintBox && !$this->expandHintBox)
        {
            $this->setSlot('elements.hints', []);
        }
    }
}