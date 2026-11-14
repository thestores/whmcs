<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;


class IconText extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Icon Text');

        $bar = new Toolbar();

        $bar->addElement((new \ModulesGarden\TSSPlugin\Components\IconText\IconText())->setIcon('plus')->setTitle('Plus'));

        $this->addElement($bar);
    }
}
