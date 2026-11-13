<?php

namespace ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Widgets;

use ModulesGarden\tssmodule\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\tssmodule\Components\HintsBox\HintsBox;
use ModulesGarden\tssmodule\Core\Components\Traits\ToolbarTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Data\Container;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Buttons\EditConfiguration;
use ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Buttons\ExpandButton;
use ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Buttons\HideButton;
use ModulesGarden\tssmodule\Packages\ModuleSettings\Support\Facades\ModuleSettings;

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