<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\tssmodule\Components\IconButton;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalLoad;

class UserEdit extends IconButton\IconButtonEdit
{
    public function loadHtml(): void
    {
        $this->onClick(new ModalLoad(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Modals\UserEdit()));
    }
}
