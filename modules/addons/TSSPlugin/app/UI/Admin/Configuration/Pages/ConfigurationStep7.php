<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Pages;

use ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Content\Step7;
use ModulesGarden\TSSPlugin\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Components\Container\Container;

class ConfigurationStep7 extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(7, new Step7()));
    }
}
