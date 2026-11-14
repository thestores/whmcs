<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Forms;

use ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Providers\FilterProvider;

use ModulesGarden\TSSPlugin\Components\Button\ButtonBasic;
use ModulesGarden\TSSPlugin\Components\Button\ButtonPrimary;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSuccess;
use ModulesGarden\TSSPlugin\Components\DatePicker\DatePicker;
use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Components\FormInputText\FormInputText;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Reload;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadById;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;

class FilterForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = FilterProvider::class;
        $this->providerAction = FilterProvider::ACTION_UPDATE;
    }

    public function loadHtml(): void
    {
        $this->builder        = BuilderCreator::twoColumns($this);
        $this->setId('datewiseSalesFilterForm');
        $toolbar = new Toolbar();

        $toolbar->addElement(
            (new ButtonSuccess())
                ->setTitle($this->translate('search'))
                ->setIcon('magnify')
                ->onClick(
                    (new ReloadById('datewiseSalesDataTable'))
                        ->withDataFromFormById($this->getId())
                )
                ->onClick(
                    (new ReloadById('DatewiseSalesHeader'))
                        ->withDataFromFormById($this->getId())
                )
        );

        $fromDateField = new DatePicker();
        $fromDateField->setTitle($this->translate('fromDate'));
        $fromDateField->setName('fromDate');
        $this->builder->addField($fromDateField);


        $toDateField = new DatePicker();
        $toDateField->setTitle($this->translate('toDate'));
        $toDateField->setName('toDate');
        $this->builder->addField($toDateField);

        $ajaxData = Request::get('ajaxData');

        if((int)$ajaxData['advancedSearch'] === 1)
        {
            $this->builder->addField((new Dropdown())->setName('brand')->setId('brandField')->setDefaultValueAsFirstOption());
            $this->builder->addField((new Dropdown())->setName('productId')->setId('productIdField')->setDefaultValueAsFirstOption());
            $this->builder->addField((new Dropdown())->setName('sslStatus')->setId('sslStatusField')->setDefaultValueAsFirstOption());
            $this->builder->addField((new FormInputText())->setName('vendorOrderId')->setId('vendorOrderIdField'));

            $toolbar->addElement(
                (new ButtonBasic())
                    ->setTitle($this->translate('basicSearch'))
                    ->onClick(
                        (new Reload($this))
                            ->withParams(['advancedSearch' => 0])
                    )
            );

        }
        else
        {
            $toolbar->addElement(
                (new ButtonBasic())
                    ->setTitle($this->translate('advancedSearch'))
                    ->onClick(
                        (new Reload($this))
                            ->withParams(['advancedSearch' => 1])
                    )
            );
        }

        $this->addElement($toolbar);
    }
}