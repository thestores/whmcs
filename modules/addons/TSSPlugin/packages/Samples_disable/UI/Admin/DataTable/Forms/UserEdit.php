<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Forms;

use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\FormInputText\FormInputText;
use ModulesGarden\TSSPlugin\Components\HiddenField\HiddenField;
use ModulesGarden\TSSPlugin\Components\Switcher\Switcher;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Providers\UserProvider;

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
