<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Pages;

use ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Content\Step3;
use ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Components\Container\Container;


class ConfigurationStep3 extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(3, new Step3()));
    }
}
