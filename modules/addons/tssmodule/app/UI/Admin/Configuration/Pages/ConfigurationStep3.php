<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Configuration\Pages;

use ModulesGarden\tssmodule\App\UI\Admin\Configuration\Content\Step3;
use ModulesGarden\tssmodule\App\UI\Admin\Configuration\Shared\WizardLayout;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Components\Container\Container;


class ConfigurationStep3 extends Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement((new WizardLayout())->build(3, new Step3()));
    }
}
