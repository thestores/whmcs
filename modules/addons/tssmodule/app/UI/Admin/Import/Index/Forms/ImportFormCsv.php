<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Forms;

use ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Providers\ImportProvider;
use ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\ProfitLoss\Providers\FilterProvider;
use ModulesGarden\tssmodule\Components\Button\ButtonPrimary;
use ModulesGarden\tssmodule\Components\Button\ButtonSuccess;
use ModulesGarden\tssmodule\Components\DatePicker\DatePicker;
use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Components\UploadField\UploadField;
use ModulesGarden\tssmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\tssmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;


class ImportFormCsv extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = ImportProvider::class;
        $this->providerAction = ImportProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::oneColumn($this);
        $this->setId('ImportFormCsv');
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
                ->setValue('csv')
                ->required()
        );

        $this->builder->addField(
            (new UploadField())
                ->setName('csv')
                ->setAllowedFileTypes(['text/csv'])
                //->required()
        );

        $this->builder->addField(
            (new Switcher())
                ->setName('generateInvoice')
                ->addClass('switcher-revert')
        );

        $this->addElement($toolbar);
    }
}