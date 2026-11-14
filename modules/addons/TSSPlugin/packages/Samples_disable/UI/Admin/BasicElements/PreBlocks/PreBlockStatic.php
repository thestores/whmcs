<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\TSSPlugin\Components\PreBLock\PreBlock;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;


class PreBlockStatic extends PreBlock implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setContent('This is sample content of pre block');
    }
}
