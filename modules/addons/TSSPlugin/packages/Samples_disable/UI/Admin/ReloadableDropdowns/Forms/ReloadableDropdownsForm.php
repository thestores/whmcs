<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ReloadableDropdowns\Forms;

use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\Row\Row;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Actions\PassAjaxData;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadById;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ReloadableDropdowns\Fields\SomeDropdown;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ReloadableDropdowns\Providers\ReloadableDropdownsProvider;

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