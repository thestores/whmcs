<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Forms;


use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Providers\ImportProvider;
use ModulesGarden\tssmodule\Components\Alert\Alert;
use ModulesGarden\tssmodule\Components\Alert\AlertInfo;
use ModulesGarden\tssmodule\Components\Alert\AlertWarning;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\Grid\Grid;
use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Components\Number\Number;
use ModulesGarden\tssmodule\Components\RadioButton\RadioButton;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\Tagger\Tagger;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;


class ImportForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider                  = ImportProvider::class;
        $this->providerAction            = ImportProvider::ACTION_CREATE;
        $this->providerActionsToValidate = ['create', 'update', 'delete'];
    }

    public function loadHtml(): void
    {
        $ajaxData = Request::get('ajaxData');
        $formData = Request::get('formData');
        $mode     = 'individual';

        if(isset($ajaxData['reloadedBy']) && $ajaxData['reloadedBy'] == 'pricingTypePercent')
        {
            $productGroupMode = ($formData['productGroup'] == 'new') ? "new" : "existing";
            $mode             = ((bool)$formData['pricingTypePercent']) ? "percent" : "individual";
        }
        elseif(isset($ajaxData['reloadedBy']) && $ajaxData['reloadedBy'] == 'pricingTypeIndividual')
        {
            $productGroupMode = ($formData['productGroup'] == 'new') ? "new" : "existing";
            $mode             = ((bool)$formData['pricingTypeIndividual']) ? "individual" : "percent";
        }
        elseif(isset($ajaxData['reloadedBy']) && $ajaxData['reloadedBy'] == 'productGroup')
        {
            $productGroupMode = ($formData['productGroup'] == 'new') ? "new" : "existing";
            $mode             = ((bool)$formData['pricingTypeIndividual']) ? "individual" : "percent";
        }

        $this->builder = BuilderCreator::oneColumn($this);

        $this->setId('productImportForm');

        $grid        = new Grid();
        $leftColumn  = new Container();
        $rightColumn = new Container();

        $grid->setRows([
                           [
                               [$leftColumn, 6],
                               [$rightColumn, 6]
                           ]
                       ]);

        $this->builder->addElement($grid);

        $pricingTypeIndividual = (new Switcher())
            ->setName('pricingTypeIndividual')
            ->addClass('switcher-revert')
            ->setId('pricingTypeIndividual')
            ->setDefaultValue('1')
            ->onChange((new Reload($this)));

        $pricingTypePercent = (new Switcher())
            ->setName('pricingTypePercent')
            ->addClass('switcher-revert')
            ->setId('pricingTypePercent')
            ->setDefaultValue('')
            ->onChange((new Reload($this)));

        //$description = (new AlertInfo())->setText($this->translate('description'))->setId('product-import-form-alert');

        $this->builder->addFieldInContainer($leftColumn, $pricingTypeIndividual);
        $this->builder->addFieldInContainer($leftColumn, $pricingTypePercent);
        //$leftColumn->addElement($description);

        $productGroupField = new Dropdown();
        $productGroupField->setName('productGroup');
        $productGroupField->required();
        $productGroupField->setDefaultValueAsFirstOption();
        $productGroupField->onChange((new Reload($this)));
        $this->builder->addFieldInContainer($rightColumn, $productGroupField);

        if($productGroupMode == 'new')
        {
            $productGroupNameField = new FormInputText();
            $productGroupNameField->setName('productGroupName');
            $productGroupNameField->required();
            $this->builder->addFieldInContainer($rightColumn, $productGroupNameField);
        }


        /*
                $currencyField = new Dropdown();
                $currencyField->setName('currency');
                $currencyField->required();
                $this->builder->addFieldInContainer($rightColumn, $currencyField);
        */

        if(!Helpers::getCurrencyIdByCode('USD')) //If USD not defined
        {
            $this->builder->addFieldInContainer(
                $rightColumn,
                (new FormInputText())
                    ->setName('rate')
                    ->required()
            );

            $rightColumn->addElement(
                (new AlertInfo())
                    ->setText($this->translate('info', [':defaultCurrency' => Helpers::getDefaultCurrencyCode()]))
                    ->setId('financial-settings-form-info')
            );
        }

        if($mode == 'percent')
        {
            $profitMarginField = new Number();
            $profitMarginField->setDefaultValue(1);
            $profitMarginField->setMin(0);
            $profitMarginField->setMax(1000);
            $profitMarginField->setName('profitMargin');
            $profitMarginField->required();
            $profitMarginField->numeric()->between(0, 1000);
            $this->builder->addFieldInContainer($rightColumn, $profitMarginField, true);
        }

        $idField = new HiddenField();
        $idField->setName('id');
        $this->builder->addFieldInContainer($rightColumn, $idField);
    }
}