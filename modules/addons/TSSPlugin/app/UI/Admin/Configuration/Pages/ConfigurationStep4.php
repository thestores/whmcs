<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Pages;

use ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Content\Step4;
use ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Components\Container\Container;


class ConfigurationStep4 extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(4, new Step4()));
    }
}
