<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Core\UI\Interfaces\ClientArea;

class PreBlocks extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new PreBlockAjax());
        $this->addElement(new PreBlockStatic());
    }
}
