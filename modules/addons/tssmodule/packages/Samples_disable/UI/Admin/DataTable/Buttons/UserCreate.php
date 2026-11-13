<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\tssmodule\Components\Button\ButtonCreate;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalLoad;

class UserCreate extends ButtonCreate
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->onClick(new ModalLoad(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Modals\UserCreate()));
    }
}
