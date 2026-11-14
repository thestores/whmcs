<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Home\SimpleForm\Pages;

use ModulesGarden\TSSPlugin\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\TSSPlugin\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Action;
use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Home\SimpleForm\Forms\SimpleAbstractForm;

class FormInWidget extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Form in widget');
        $this->addElement(new SimpleAbstractForm());

        $this->addToToolbar($this->createDropdown());
    }

    public function createDropdown()
    {
        return (new DropdownMenu())
            ->setName('dropdownmenu')
            ->addItem((new DropdownMenuItem())
                ->setIcon('delete')
                ->setTitle('XXXXXX')
                ->setType(Color::DANGER)
                ->onClick(Action::modalLoad(new UserDelete()))
            );
    }
}
