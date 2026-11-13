<?php

namespace ModulesGarden\tssmodule\Packages\Product\UI\Modals;

use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Packages\Product\Enums\ConfigSettings;

class CreateConfigurableOptions extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setSize(Config::get(ConfigSettings::CONFIG_OPTIONS_MODAL_SIZE, ""));
        $this->addElement(new \ModulesGarden\tssmodule\Packages\Product\UI\Forms\CreateConfigurableOptions());
    }
}