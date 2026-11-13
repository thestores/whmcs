<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\IconButton\IconButtonDanger;
use ModulesGarden\tssmodule\Components\IconButton\IconButtonEdit;
use ModulesGarden\tssmodule\Components\IconButton\IconButtonInfo;
use ModulesGarden\tssmodule\Components\IconButton\IconButtonPrimary;
use ModulesGarden\tssmodule\Components\IconButton\IconButtonSuccess;
use ModulesGarden\tssmodule\Components\IconButton\IconButtonWarning;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;


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
