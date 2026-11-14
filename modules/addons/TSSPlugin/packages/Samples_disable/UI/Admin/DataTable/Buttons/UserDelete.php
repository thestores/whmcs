<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\TSSPlugin\Components\IconButton;
use ModulesGarden\TSSPlugin\Core\Components\Action;

class UserDelete extends IconButton\IconButtonDelete
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->onClick(Action::modalOpen(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete()));
    }
}
