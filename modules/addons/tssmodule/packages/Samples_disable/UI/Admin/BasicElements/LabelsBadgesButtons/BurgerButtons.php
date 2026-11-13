<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\tssmodule\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\tssmodule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use function ModulesGarden\tssmodule\Core\translator;

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
