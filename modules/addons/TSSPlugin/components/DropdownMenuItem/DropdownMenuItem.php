<?php

namespace ModulesGarden\TSSPlugin\Components\DropdownMenuItem;

use ModulesGarden\TSSPlugin\Components\Button\Button;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\DropdownMenuItemInterface;

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
