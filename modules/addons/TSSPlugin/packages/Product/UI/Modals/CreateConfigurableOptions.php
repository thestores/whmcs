<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\UI\Modals;

use ModulesGarden\TSSPlugin\Components\Modal\ModalEdit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;
use ModulesGarden\TSSPlugin\Packages\Product\Enums\ConfigSettings;

class CreateConfigurableOptions extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setSize(Config::get(ConfigSettings::CONFIG_OPTIONS_MODAL_SIZE, ""));
        $this->addElement(new \ModulesGarden\TSSPlugin\Packages\Product\UI\Forms\CreateConfigurableOptions());
    }
}