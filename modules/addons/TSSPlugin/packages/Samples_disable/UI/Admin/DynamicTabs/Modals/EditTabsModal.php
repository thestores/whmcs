<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs\Modals;

use ModulesGarden\TSSPlugin\Components\Modal\ModalEdit;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DynamicTabs\Forms\EditTabsForm;

class EditTabsModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Edit Tabs');
        $this->addElement(new EditTabsForm());
    }
}