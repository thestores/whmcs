<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Forms;

use ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Providers\GetCsvProvider;
use ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\Renewal\Providers\FilterProvider;
use ModulesGarden\tssmodule\Components\Button\ButtonPrimary;
use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;


class GetCsvForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = GetCsvProvider::class;
        $this->providerAction = GetCsvProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {

    }
}