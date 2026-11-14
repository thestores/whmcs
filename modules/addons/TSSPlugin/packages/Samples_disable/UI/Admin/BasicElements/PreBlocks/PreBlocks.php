<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Core\UI\Interfaces\ClientArea;

class PreBlocks extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface, ClientAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new PreBlockAjax());
        $this->addElement(new PreBlockStatic());
    }
}
