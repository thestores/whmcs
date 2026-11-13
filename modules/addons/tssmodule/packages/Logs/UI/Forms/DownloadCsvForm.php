<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Forms;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Packages\Logs\UI\Providers\DownloadCsvProvider;

class DownloadCsvForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = DownloadCsvProvider::class;
}