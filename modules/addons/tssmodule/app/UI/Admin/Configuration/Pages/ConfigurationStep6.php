<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Configuration\Pages;

use ModulesGarden\tssmodule\App\UI\Admin\Configuration\Content\Step6;
use ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Components\Container\Container;


class ConfigurationStep6 extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(6, new Step6()));
    }
}
