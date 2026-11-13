<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Home\SimpleForm\Pages;

use ModulesGarden\tssmodule\Components\DropdownMenu\DropdownMenu;
use ModulesGarden\tssmodule\Components\DropdownMenuItem\DropdownMenuItem;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Action;
use ModulesGarden\tssmodule\Core\Components\Enums\Color;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Home\SimpleForm\Forms\SimpleAbstractForm;

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
