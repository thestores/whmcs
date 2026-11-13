<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;

class LabelsBadgesButtons extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Labels());
        $this->addElement(new Badges());
        $this->addElement(new Buttons());
        $this->addElement(new IconButtons());
        $this->addElement(new IconText());
        $this->addElement(new IconsAll());
        $this->addElement(new BurgerButtons());
    }
}
