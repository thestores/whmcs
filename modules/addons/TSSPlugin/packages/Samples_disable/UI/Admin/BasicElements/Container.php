<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons\LabelsBadgesButtons;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\Modals\Modals;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\PreBlocks\PreBlocks;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Alerts\Alerts());
        $this->addElement(new LabelsBadgesButtons());
        $this->addElement(new Modals());
        $this->addElement(new PreBlocks());
    }
}