<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets;

use ModulesGarden\tssmodule\Components\ProgressBar\ProgressBar;
use ModulesGarden\tssmodule\Components\ProgressBar\ProgressBarDanger;
use ModulesGarden\tssmodule\Components\ProgressBar\ProgressBarInfo;
use ModulesGarden\tssmodule\Components\ProgressBar\ProgressBarSuccess;
use ModulesGarden\tssmodule\Components\ProgressBar\ProgressBarWarning;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ProgressBarsWidgetBaseStyles extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Base Styles Examples Progress Bars");

        $bar10 = (new ProgressBar())->setText("Primary ProgressBar")->setFill(10);
        $bar30 = (new ProgressBarInfo())->setText("Info ProgressBar")->setFill(30);
        $bar50 = (new ProgressBarSuccess())->setText("Success ProgressBar")->setFill(50);
        $bar60 = (new ProgressBarWarning())->setText("Warning ProgressBar")->setFill(60);
        $bar80 = (new ProgressBarDanger())->setText("Danger ProgressBar")->setFill(80);

        $this->addElement($bar10);
        $this->addElement($bar30);
        $this->addElement($bar50);
        $this->addElement($bar60);
        $this->addElement($bar80);
    }

}