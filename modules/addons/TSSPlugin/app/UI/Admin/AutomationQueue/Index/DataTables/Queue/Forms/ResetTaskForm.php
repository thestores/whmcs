<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Forms;

use ModulesGarden\TSSPlugin\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Providers\ResetTaskProvider;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Components\HiddenField\HiddenField;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;

class ResetTaskForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = ResetTaskProvider::class;
    // Default action "read" generates the integrity token for "id" (required by "update") - the modal has to be loaded via modalLoad
    protected string $providerAction = CrudProvider::ACTION_UPDATE;

    public function loadHtml(): void
    {
        $this->builder->createField(HiddenField::class, 'id');
    }
}
