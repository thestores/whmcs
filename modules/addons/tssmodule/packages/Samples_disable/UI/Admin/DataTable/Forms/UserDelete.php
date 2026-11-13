<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Forms;

use ModulesGarden\tssmodule\Components\Form\AbstractForm;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Providers\UserProvider;

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
