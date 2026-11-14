<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\TSSPlugin\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\TSSPlugin\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use function ModulesGarden\TSSPlugin\Core\translator;

class BurgerButtons extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle(translator()->get('Icon Buttons'));

        $dropdown = (new DropdownMenu());
        $dropdown->addItem((new DropdownMenuItem())
            ->setIcon('delete')
            ->setTitle('Delete'));

        $dropdown->addItem((new DropdownMenuItem())
            ->setIcon('plus')
            ->setTitle('Add'));

        $bar = new Toolbar();
        $bar->addElement($dropdown);

        $this->addElement($bar);
    }
}
