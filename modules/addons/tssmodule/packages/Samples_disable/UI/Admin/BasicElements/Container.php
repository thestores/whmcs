<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons\LabelsBadgesButtons;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\Modals\Modals;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\PreBlocks\PreBlocks;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Alerts\Alerts());
        $this->addElement(new LabelsBadgesButtons());
        $this->addElement(new Modals());
        $this->addElement(new PreBlocks());
    }
}