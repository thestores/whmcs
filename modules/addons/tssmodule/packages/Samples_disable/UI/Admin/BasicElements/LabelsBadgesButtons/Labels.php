<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons;

use ModulesGarden\tssmodule\Components\Label\Label;
use ModulesGarden\tssmodule\Components\Label\LabelDanger;
use ModulesGarden\tssmodule\Components\Label\LabelInfo;
use ModulesGarden\tssmodule\Components\Label\LabelPrimary;
use ModulesGarden\tssmodule\Components\Label\LabelSecondary;
use ModulesGarden\tssmodule\Components\Label\LabelSuccess;
use ModulesGarden\tssmodule\Components\Label\LabelWarning;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;


class Labels extends Widget implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Labels');

        $bar = new Toolbar();
        $bar->addElement((new LabelWarning())->setText('Label Warning'));
        $bar->addElement((new LabelSuccess())->setText('Label Success'));
        $bar->addElement((new LabelDanger())->setText('Label Danger'));
        $bar->addElement((new LabelInfo())->setText('Label Info'));
        $bar->addElement((new LabelPrimary())->setText('Label Primary'));
        $bar->addElement((new LabelSecondary())->setText('Label Secondary'));
        $bar->addElement((new Label())->setText('Label Info'));

        $bar->addElement((new LabelWarning())->setText('Label Warning')->displayAsStatusLabel());
        $bar->addElement((new LabelSuccess())->setText('Label Success')->displayAsStatusLabel());
        $bar->addElement((new LabelDanger())->setText('Label Danger')->displayAsStatusLabel());
        $bar->addElement((new LabelInfo())->setText('Label Info')->displayAsStatusLabel());
        $bar->addElement((new LabelPrimary())->setText('Label Primary')->displayAsStatusLabel());
        $bar->addElement((new LabelSecondary())->setText('Label Secondary')->displayAsStatusLabel());
        $bar->addElement((new Label())->setText('Label')->displayAsStatusLabel());

        $this->addElement($bar);
    }
}
