<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ReloadableDropdowns\Forms;

use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Form\AbstractForm;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Row\Row;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\tssmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ReloadableDropdowns\Fields\SomeDropdown;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ReloadableDropdowns\Providers\ReloadableDropdownsProvider;

class ReloadableDropdownsForm extends AbstractForm implements AdminAreaInterface
{
    protected string $provider = ReloadableDropdownsProvider::class;
    protected string $providerAction = ReloadableDropdownsProvider::ACTION_UPDATE;

    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::twoColumns($this);
    }

    public function loadHtml(): void
    {
        $this->builder->createField(Dropdown::class, 'masterDropdown')
            ->setDefaultValueAsFirstOption()
            ->onChange(new PassAjaxData('slaveDropdown'))
            ->onChange(new ReloadById('slaveDropdown'));
        $this->builder->addElement((new Row()));
        $this->builder->createField(SomeDropdown::class, 'slaveDropdown');
    }
}