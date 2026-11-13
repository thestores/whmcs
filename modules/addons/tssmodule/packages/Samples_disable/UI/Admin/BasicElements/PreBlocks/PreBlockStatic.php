<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\tssmodule\Components\PreBLock\PreBlock;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;


class PreBlockStatic extends PreBlock implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setContent('This is sample content of pre block');
    }
}
