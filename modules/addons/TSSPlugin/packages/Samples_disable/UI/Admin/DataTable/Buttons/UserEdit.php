<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\TSSPlugin\Components\IconButton;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalLoad;

class UserEdit extends IconButton\IconButtonEdit
{
    public function loadHtml(): void
    {
        $this->onClick(new ModalLoad(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Modals\UserEdit()));
    }
}
