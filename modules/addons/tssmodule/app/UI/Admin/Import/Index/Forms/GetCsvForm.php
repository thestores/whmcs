<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Forms;


use ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Providers\GetCsvProvider;
use ModulesGarden\tssmodule\Components\Form\Form;
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