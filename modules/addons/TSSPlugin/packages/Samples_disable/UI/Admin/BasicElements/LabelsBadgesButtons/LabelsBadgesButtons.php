<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class LabelsBadgesButtons extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface
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
