<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Forms;

use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Packages\Logs\UI\Providers\DeleteLogProvider;

class DeleteLogForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = DeleteLogProvider::class;
    protected string $providerAction = CrudProvider::ACTION_DELETE;
    protected ?string $providerDefaultAction = null;

    public function loadHtml(): void
    {
        $this->builder->createField(HiddenField::class, 'id');
    }
}
