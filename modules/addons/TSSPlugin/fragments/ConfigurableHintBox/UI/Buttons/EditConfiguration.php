<?php

namespace ModulesGarden\TSSPlugin\Fragments\ConfigurableHintBox\UI\Buttons;

use ModulesGarden\TSSPlugin\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Fragments\ConfigurableHintBox\UI\Modals\EditConfigurationModal;

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