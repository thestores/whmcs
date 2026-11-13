<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;


class IconText extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Icon Text');

        $bar = new Toolbar();

        $bar->addElement((new \ModulesGarden\tssmodule\Components\IconText\IconText())->setIcon('plus')->setTitle('Plus'));

        $this->addElement($bar);
    }
}
