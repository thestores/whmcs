<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Forms;

use ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Providers\ImportProvider;
use ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Providers\TemplateDownloadProvider;
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
use ModulesGarden\tssmodule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\tssmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\tssmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;


class TemplateDownloadForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = TemplateDownloadProvider::class;
        $this->providerAction = TemplateDownloadProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {
        $this->builder = BuilderCreator::oneColumn($this);
        $this->setId('TemplateDownloadForm');
        $toolbar = new Toolbar();

        $toolbar->addElement(
            (new ButtonSuccess())
                ->setTitle($this->translate('download'))
                ->setIcon('file-document-outline')
                ->onClick(
                    new FormSubmit($this)
                )
        );

        $this->addElement($toolbar);
    }
}