<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Forms;

use ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Providers\DownloadLogProvider;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;


class DownloadLogForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->provider       = DownloadLogProvider::class;
        $this->providerAction = DownloadLogProvider::ACTION_CREATE;
    }

    public function loadHtml(): void
    {

    }
}