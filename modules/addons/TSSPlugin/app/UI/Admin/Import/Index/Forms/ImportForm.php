<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Import\Index\Forms;

use ModulesGarden\TSSPlugin\App\UI\Admin\Import\Index\Providers\ImportProvider;
use ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Providers\FilterProvider;
use ModulesGarden\TSSPlugin\Components\Button\ButtonPrimary;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSuccess;
use ModulesGarden\TSSPlugin\Components\DatePicker\DatePicker;
use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Components\FormInputText\FormInputText;
use ModulesGarden\TSSPlugin\Components\HiddenField\HiddenField;
use ModulesGarden\TSSPlugin\Components\Switcher\Switcher;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Core\Components\Actions\FormSubmit;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadById;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;


class ImportForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = ImportProvider::class;
        $this->providerAction = ImportProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::twoColumns($this);
        $this->setId('ImportForm');
        $toolbar = new Toolbar();

        $toolbar->addElement(
            (new ButtonSuccess())
                ->setTitle($this->translate('import'))
                ->setIcon('import')
                ->onClick(
                    (new FormSubmit($this))
                )
        );

        $this->builder->addField(
            (new HiddenField())
                ->setName('mode')
                ->setValue('single')
        );

        $this->builder->addField(
            (new FormInputText())
                ->setTitle($this->translate('remoteOrderId'))
                ->setName('remoteOrderId')
                ->required()
        );

        $this->builder->addField(
            (new Dropdown())
                ->setTitle($this->translate('clientId'))
                ->setName('clientId')
                ->required()
        );

        $this->builder->addField(
            (new FormInputText())
                ->setTitle($this->translate('serviceId'))
                ->setName('serviceId')
        );

        $this->builder->addField(
            (new Dropdown())
                ->setTitle($this->translate('payMethod'))
                ->setName('payMethod')
                ->required()
        );

        $this->builder->addField(
            (new Switcher())
                ->setTitle($this->translate('generateInvoice'))
                ->setName('generateInvoice')
                ->addClass('switcher-revert')
        );

        $this->addElement($toolbar);
    }
}