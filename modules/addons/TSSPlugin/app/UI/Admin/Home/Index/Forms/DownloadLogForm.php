<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Forms;

use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Providers\DownloadLogProvider;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;


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