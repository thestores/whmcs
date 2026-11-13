<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\tssmodule\Components\Badge\BadgeDanger;
use ModulesGarden\tssmodule\Components\Badge\BadgeInfo;
use ModulesGarden\tssmodule\Components\Badge\BadgeSuccess;
use ModulesGarden\tssmodule\Components\Badge\BadgeWarning;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;


class Badges extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Badges');

        $bar = new Toolbar();

        $bar->addElement((new BadgeDanger())->setText('1'));
        $bar->addElement((new BadgeSuccess())->setText('2'));
        $bar->addElement((new BadgeWarning())->setText('3'));
        $bar->addElement((new BadgeInfo())->setText('4'));

        $this->addElement($bar);
    }
}
