<?php

namespace ModulesGarden\TSSPlugin\Packages\Logs\UI\Forms;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Providers\DownloadCsvProvider;

class DownloadCsvForm extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = DownloadCsvProvider::class;
}