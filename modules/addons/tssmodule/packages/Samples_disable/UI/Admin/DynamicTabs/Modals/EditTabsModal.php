<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs\Modals;

use ModulesGarden\tssmodule\Components\Modal\ModalEdit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DynamicTabs\Forms\EditTabsForm;

class EditTabsModal extends ModalEdit implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Edit Tabs');
        $this->addElement(new EditTabsForm());
    }
}