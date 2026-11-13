<?php

namespace ModulesGarden\tssmodule\Packages\Product\UI\Modals;

use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Packages\Product\Enums\ConfigSettings;

class ServerConfiguration extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('modal.title'));

        $serverConfigForm = Config::get(ConfigSettings::PRODUCT_SERVER_CONFIG_FORM);

        $this->addElement(new $serverConfigForm());
    }
}