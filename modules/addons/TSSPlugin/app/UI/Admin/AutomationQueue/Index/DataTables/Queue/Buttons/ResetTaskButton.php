<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Buttons;

use ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Modals\ResetTaskModal;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButtonWarning;
use ModulesGarden\TSSPlugin\Core\Components\Action;

class ResetTaskButton extends IconButtonWarning
{
    public function __construct()
    {
        parent::__construct();

        $this->setIcon('restore');
    }

    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->setTitle($this->translate('resetTask'));
        // modalLoad (not modalOpen) - the modal is loaded with the row "id", so read() generates a valid integrity token
        $this->onClick(Action::modalLoad(new ResetTaskModal()));
    }
}
