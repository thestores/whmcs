<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Forms;

use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Components\HiddenField\HiddenField;
use ModulesGarden\TSSPlugin\Components\PreBlockArrayPrint\PreBlockArrayPrint;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Providers\ShowDataProvider;

class ShowDataForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = ShowDataProvider::class;
    protected string $providerAction = CrudProvider::ACTION_DELETE;

    public function loadHtml(): void
    {
        $this->builder->createField(HiddenField::class, 'id');
        $this->builder->createField(PreBlockArrayPrint::class, 'data');
    }
}
