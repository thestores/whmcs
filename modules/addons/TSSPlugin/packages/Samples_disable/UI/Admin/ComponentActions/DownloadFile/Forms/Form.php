<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Forms;

use ModulesGarden\TSSPlugin\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Providers\Provider;

class Form extends \ModulesGarden\TSSPlugin\Components\Form\Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = Provider::class;
}