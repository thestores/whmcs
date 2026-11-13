<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\PreBlocks;

use ModulesGarden\tssmodule\Components\PreBlock\PreBlock;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxOnLoadInterface;


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
