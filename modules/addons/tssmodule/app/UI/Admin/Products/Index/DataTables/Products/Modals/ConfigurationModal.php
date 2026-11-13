<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Modals;


use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Forms\ConfigurationForm;
use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ConfigurationModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ConfigurationForm());
    }
}
