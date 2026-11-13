<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\Alerts;

use ModulesGarden\tssmodule\Components\Alert\AlertDanger;
use ModulesGarden\tssmodule\Components\Alert\AlertInfo;
use ModulesGarden\tssmodule\Components\Alert\AlertSuccess;
use ModulesGarden\tssmodule\Components\Alert\AlertWarning;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;


class Alerts extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $widget = new Widget();
        $widget->setTitle('Alerts');

        $widget->addElement((new AlertDanger())->setText('Alert Danger'));
        $widget->addElement((new AlertInfo())->setText('Alert Info'));
        $widget->addElement((new AlertSuccess())->setText('Alert Success'));
        $widget->addElement((new AlertWarning())->setText('Alert Warning'));

        $widget->addElement((new AlertDanger())->setText($this->translate('Alert Danger with outline'))->setOutline());
        $widget->addElement((new AlertInfo())->setText('Alert Info with outline')->setOutline());
        $widget->addElement((new AlertSuccess())->setText('Alert Success with outline')->setOutline());
        $widget->addElement((new AlertWarning())->setText('Alert Warning with outline')->setOutline());

        $widget->addElement((new AlertDanger())->setText('Alert Danger with dismiss button')->showDismissButton());
        $widget->addElement((new AlertInfo())->setText('Alert Info with dismiss button')->showDismissButton());
        $widget->addElement((new AlertSuccess())->setText('Alert Success with dismiss button')->showDismissButton());
        $widget->addElement((new AlertWarning())->setText('Alert Warning with dismiss button')->showDismissButton());

        $widget->addElement((new AlertDanger())->setText('Alert Danger with outline and dismiss button')->setOutline()->showDismissButton());
        $widget->addElement((new AlertInfo())->setText('Alert Info with outline and dismiss button')->setOutline()->showDismissButton());
        $widget->addElement((new AlertSuccess())->setText('Alert Success with outline and dismiss button')->setOutline()->showDismissButton());
        $widget->addElement((new AlertWarning())->setText('Alert Warning with outline and dismiss button')->setOutline()->showDismissButton());

        $this->addElement($widget);
    }
}
