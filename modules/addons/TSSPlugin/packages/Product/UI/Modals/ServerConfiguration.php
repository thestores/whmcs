<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\UI\Modals;

use ModulesGarden\TSSPlugin\Components\Modal\ModalEdit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;
use ModulesGarden\TSSPlugin\Packages\Product\Enums\ConfigSettings;

class ServerConfiguration extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('modal.title'));

        $serverConfigForm = Config::get(ConfigSettings::PRODUCT_SERVER_CONFIG_FORM);

        $this->addElement(new $serverConfigForm());
    }
}