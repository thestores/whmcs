<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Forms;


use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\App\Models\RemoteProduct;
use ModulesGarden\tssmodule\App\Repositories\Whmcs\ProductRepository;
use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Providers\ConfigurationProvider;
use ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Providers\ImportProvider;
use ModulesGarden\tssmodule\Components\Checkbox\Checkbox;
use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Components\Number\Number;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\TextArea\TextArea;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Packages\Product\Services\ConfigurableOptions;


class ConfigurationForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();
        $this->provider       = ConfigurationProvider::class;
        $this->providerAction = ImportProvider::ACTION_UPDATE;
    }

    public function loadHtml(): void
    {
        $formData          = Request::get('formData');
        $localId           = $formData['id'];
        $remoteProduct     = RemoteProduct::find($localId);
        $remoteProductData = $remoteProduct->rawData;
        $whmcsProduct      = $remoteProduct->getWhmcsProduct();


        $cratedOptions       = [];
        $expectedOptionNames = [
            'single'   => 'sans',
            'wildcard' => 'sans_wildcard',
        ];

        $configurableOptionsService = new ConfigurableOptions($whmcsProduct);

        foreach($expectedOptionNames as $remoteOptionName => $localOptionName)
        {
            $configurableOptionModel = $configurableOptionsService->getConfigurableOptionByName($localOptionName);

            if($configurableOptionModel)
            {
                $cratedOptions[] = $localOptionName;
            }
        }

        $this->setId('productConfigurationForm');
        $this->builder = BuilderCreator::oneColumn($this);

        $this->builder->addField(
            (new HiddenField())->setName('id')
        );

        $this->builder->addField(
            (new HiddenField())->setName('whmcsProductId')
        );

        $this->builder->addField(
            (new FormInputText())->setName('remoteProductName')->setReadOnly(true)->setDisabled()
        );

        $this->builder->addField(
            (new FormInputText())->setName('productName')
        );

        $this->builder->addField(
            (new TextArea())->setName('description')
        );

        $this->builder->addField(
            (new Dropdown())->setName('autoSetup')
        );

        $min         = $remoteProductData['san']['min'] ?: 0;
        $max         = $remoteProductData['san']['max'] ?: 0;
        $maxIncluded = $max + $min;

        if(in_array('sans', $cratedOptions))
        {
            $this->builder->addField(
                (new Switcher())->setName('enableSan')->addClass('switcher-revert')
            );

            $this->builder->addField(
                (new Number())->setName('includedSan')->setMax($maxIncluded)->setMin(0)->numeric()->between(0, $maxIncluded)
            );
        }

        if(in_array('sans_wildcard', $cratedOptions))
        {
            $this->builder->addField(
                (new Switcher())->setName('enableWildcard')->addClass('switcher-revert')
            );

            $this->builder->addField(
                (new Number())->setName('includedWildcard')->setMax($maxIncluded)->setMin(0)->numeric()->between(0, $maxIncluded)
            );
        }

        $this->builder->addField(
            (new Switcher())->setName('hidden')->addClass('switcher-revert')
        );

        $this->builder->addField(
            (new Dropdown())->setName('payType')
        );

        $this->builder->addField(
            (new Dropdown())->setName('months')
        );

        $this->builder->addField(
            (new FormInputText())->setName('margin')
        );

        $this->builder->addField(
            (new TextArea())->setName('processingGuide')
        );

        $this->builder->addField(
            (new TextArea())->setName('issuedMessage')
        );
    }
}