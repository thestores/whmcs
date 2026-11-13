<?php

namespace ModulesGarden\tssmodule\Components\DropdownMenuItem;

use ModulesGarden\tssmodule\Components\Button\Button;
use ModulesGarden\tssmodule\Core\Contracts\Components\DropdownMenuItemInterface;

class DropdownMenuItem extends Button implements DropdownMenuItemInterface
{
    public const COMPONENT = 'DropdownMenuItem';

    public function __construct()
    {
        parent::__construct();

        $this->setTranslations([
            'title',
        ]);
    }
}
