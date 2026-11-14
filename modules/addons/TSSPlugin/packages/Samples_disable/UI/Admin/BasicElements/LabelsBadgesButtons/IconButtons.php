<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButtonDanger;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButtonEdit;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButtonInfo;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButtonPrimary;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButtonSuccess;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButtonWarning;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;


class IconButtons extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Icon Buttons');

        $bar = new Container();

        $bar->addElement((new IconButtonDanger())->setIcon('delete')->setTitle('IconButtonDanger'));
        $bar->addElement((new IconButtonInfo())->setIcon('shape')->setTitle('IconButtonInfo'));
        $bar->addElement((new IconButtonWarning())->setIcon('google')->setTitle('IconButtonWarning'));
        $bar->addElement((new IconButtonSuccess())->setIcon('abacus')->setTitle('IconButtonSuccess'));
        $bar->addElement((new IconButtonEdit())->setTitle('IconButtonEdit'));
        $bar->addElement((new IconButtonPrimary())->setIcon('airplane')->setTitle('IconButtonPrimary'));

        $this->addElement($bar);
    }

}
