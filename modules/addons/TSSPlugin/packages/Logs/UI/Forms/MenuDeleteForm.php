<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Forms;

use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Components\Number\Number;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Providers\MassDeleteProvider;

class MenuDeleteForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = MassDeleteProvider::class;
    protected string $providerAction = MassDeleteProvider::ACTION_DELETE;

    public function loadHtml(): void
    {
        $this->builder->addField((new Dropdown())
            ->setMultiple()
            ->setName('types'),
            true
        );

        $this->builder->addField((new Number())
            ->setName('delete_older_than')
            ->setRange(0, 9999)
            ->setDefaultValue(0),
            true
        );
    }
}
