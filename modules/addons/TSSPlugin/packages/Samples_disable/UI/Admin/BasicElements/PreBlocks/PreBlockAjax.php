<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\TSSPlugin\Components\PreBlock\PreBlock;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxOnLoadInterface;


class PreBlockAjax extends PreBlock implements AdminAreaInterface, AjaxOnLoadInterface
{
    public function loadData(): void
    {
        $this->setContent('This is content from ajax!');
    }

    public function loadHtml(): void
    {
        $this->setContent('This is sample content of pre    block');
    }
}
