<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Forms;

use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\HiddenField\HiddenField;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Providers\UserProvider;

class UserDelete extends AbstractForm implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = UserProvider::class;
    protected string $providerAction = 'delete';

    public function loadHtml(): void
    {
        BuilderCreator::simple($this)
            ->createField(HiddenField::class, 'id');
    }
}
