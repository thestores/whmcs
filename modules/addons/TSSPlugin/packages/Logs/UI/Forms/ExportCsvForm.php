<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Forms;

use ModulesGarden\TSSPlugin\Components\DatePicker\DatePicker;
use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Providers\ExportProvider;

class ExportCsvForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = ExportProvider::class;
    protected string $providerAction = ExportProvider::ACTION_CREATE;

    public function loadHtml(): void
    {
        $this->builder->addField((new DatePicker())->setName('from')->addValidator('date'),true);
        $this->builder->addField((new DatePicker())->setName('to')->addValidator('date'),true);
        $this->builder->addField(
            (new Dropdown())
                ->setMultiple()
                ->setName('types')
                ->setPlaceholder($this->translate('allTypes')),
            true);
    }

}