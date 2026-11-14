<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Products\Index\DataTables\Products\Modals;


use ModulesGarden\TSSPlugin\App\UI\Admin\Products\Index\DataTables\Products\Forms\ConfigurationForm;
use ModulesGarden\TSSPlugin\Components\Modal\ModalEdit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class ConfigurationModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ConfigurationForm());
    }
}
