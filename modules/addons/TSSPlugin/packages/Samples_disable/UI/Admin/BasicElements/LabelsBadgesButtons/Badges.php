<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\TSSPlugin\Components\Badge\BadgeDanger;
use ModulesGarden\TSSPlugin\Components\Badge\BadgeInfo;
use ModulesGarden\TSSPlugin\Components\Badge\BadgeSuccess;
use ModulesGarden\TSSPlugin\Components\Badge\BadgeWarning;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;


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
