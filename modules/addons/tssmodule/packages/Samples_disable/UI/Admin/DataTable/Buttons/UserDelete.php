<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\tssmodule\Components\IconButton;
use ModulesGarden\tssmodule\Core\Components\Action;

class UserDelete extends IconButton\IconButtonDelete
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->onClick(Action::modalOpen(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete()));
    }
}
