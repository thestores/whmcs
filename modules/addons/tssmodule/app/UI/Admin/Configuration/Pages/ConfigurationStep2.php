<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Configuration\Pages;

use ModulesGarden\tssmodule\App\UI\Admin\Configuration\Content\Step2;
use ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Components\Container\Container;


class ConfigurationStep2 extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(2, new Step2()));
    }
}
