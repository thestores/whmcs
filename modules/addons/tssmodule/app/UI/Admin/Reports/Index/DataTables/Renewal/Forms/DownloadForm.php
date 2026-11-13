<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Forms;

use ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Providers\DownloadProvider;
use ModulesGarden\tssmodule\Components\Button\ButtonPrimary;
use ModulesGarden\tssmodule\Components\Button\ButtonSuccess;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\HiddenField\HiddenField;
use ModulesGarden\tssmodule\Core\Components\Actions\FormSubmit;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;


class DownloadForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = DownloadProvider::class;
        $this->providerAction = DownloadProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {
        $this->setId('renewalDownloadForm');
        $ajaxData = Request::get('ajaxData')?:[];

        foreach ($ajaxData as $key => $val)
        {
            $hiddenField = (new HiddenField())->setName($key)->setValue($val);
            $this->addElement($hiddenField);
        }

        $this->addElement((new ButtonSuccess())->setTitle($this->translate('downloadCsv'))->setIcon('file-document-outline')->onClick(new FormSubmit($this)));
    }
}