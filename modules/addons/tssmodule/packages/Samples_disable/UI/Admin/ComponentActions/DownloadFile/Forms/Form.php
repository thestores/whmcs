<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Forms;

use ModulesGarden\tssmodule\Components\Button\ButtonSubmitSuccess;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Providers\Provider;

class Form extends \ModulesGarden\tssmodule\Components\Form\Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = Provider::class;
}