<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\TSSPlugin\Components\Button\ButtonDanger;
use ModulesGarden\TSSPlugin\Components\Button\ButtonInfo;
use ModulesGarden\TSSPlugin\Components\Button\ButtonPrimary;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSuccess;
use ModulesGarden\TSSPlugin\Components\Button\ButtonWarning;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;


class Buttons extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Buttons');

        $bar = new Toolbar();

        $bar->addElement((new ButtonSuccess())->setTitle('Button Success'));
        $bar->addElement((new ButtonDanger())->setTitle('Button Danger'));
        $bar->addElement((new ButtonWarning())->setTitle('Button Warning'));
        $bar->addElement((new ButtonInfo())->setTitle('Button Info'));
        $bar->addElement((new ButtonPrimary())->setTitle('Button Primary'));

        $bar->addElement((new ButtonSuccess())->setTitle('Button Success')->setIcon('plus'));
        $bar->addElement((new ButtonDanger())->setTitle('Button Danger')->setIcon('plus'));
        $bar->addElement((new ButtonWarning())->setTitle('Button Warning')->setIcon('plus'));
        $bar->addElement((new ButtonInfo())->setTitle('Button Info')->setIcon('plus'));
        $bar->addElement((new ButtonPrimary())->setTitle('Button Primary')->setIcon('plus'));

        $this->addElement($bar);
    }
}
