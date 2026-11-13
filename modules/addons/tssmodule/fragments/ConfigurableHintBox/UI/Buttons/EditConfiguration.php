<?php

namespace ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Buttons;

use ModulesGarden\tssmodule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Fragments\ConfigurableHintBox\UI\Modals\EditConfigurationModal;

class EditConfiguration extends DropdownMenuItem implements AdminAreaInterface
{
    protected string $widgetId;

    public function __construct(string $widgetId)
    {
        parent::__construct();

        $this->widgetId = $widgetId;
    }

    public function loadHtml(): void
    {
        $this->setIcon('cog');
        $this->onClick(Action::modalLoad(new EditConfigurationModal())->withParams(["widgetId" => $this->widgetId ]));
    }
}