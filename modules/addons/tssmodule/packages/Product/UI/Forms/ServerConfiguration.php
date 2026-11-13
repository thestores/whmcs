<?php

namespace ModulesGarden\tssmodule\Packages\Product\UI\Forms;

use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ServerConfiguration extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = \ModulesGarden\tssmodule\Packages\Product\UI\Providers\ServerConfiguration::class;
}