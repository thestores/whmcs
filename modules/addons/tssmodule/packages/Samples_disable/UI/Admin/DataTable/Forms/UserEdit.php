<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Forms;

use ModulesGarden\tssmodule\Components\Form\AbstractForm;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Providers\UserProvider;

class UserEdit extends AbstractForm implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = UserProvider::class;
    protected string $providerAction = 'update';

    public function loadHtml(): void
    {
        $builder = BuilderCreator::simple($this);

        $builder->createField(HiddenField::class, 'id');
        $builder->createField(FormInputText::class, 'firstname')
            ->setValidators(['required']);

        $builder->createField(FormInputText::class, 'lastname');
        $builder->createField(Switcher::class, 'taxexempt');
    }
}
