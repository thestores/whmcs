<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\UI\Forms;

use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class ServerConfiguration extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = \ModulesGarden\TSSPlugin\Packages\Product\UI\Providers\ServerConfiguration::class;
}