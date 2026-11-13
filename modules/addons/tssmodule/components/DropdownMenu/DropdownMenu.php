<?php

namespace ModulesGarden\tssmodule\Components\DropdownMenu;

use ModulesGarden\tssmodule\Core\Components\FormFields\FormField;
use ModulesGarden\tssmodule\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\tssmodule\Core\Components\Traits\TranslatorTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\DropdownMenuItemInterface;

class DropdownMenu extends FormField
{
    use ComponentsContainerTrait;
    use TranslatorTrait;

    public const COMPONENT = 'DropdownMenu';

    public function __construct()
    {
        parent::__construct();

        $this->setTranslations([
            'more_actions',
        ]);
    }

    public function addItem(DropdownMenuItemInterface $item): self
    {
        $this->addComponent('items', $item);

        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->setSlot('title', $title);

        return $this;
    }
}
