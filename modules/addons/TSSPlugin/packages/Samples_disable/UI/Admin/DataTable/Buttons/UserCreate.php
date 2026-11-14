<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Buttons;

use ModulesGarden\TSSPlugin\Components\Button\ButtonCreate;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalLoad;

class UserCreate extends ButtonCreate
{
    public function loadHtml(): void
    {
        parent::loadHtml();

        $this->onClick(new ModalLoad(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Modals\UserCreate()));
    }
}
