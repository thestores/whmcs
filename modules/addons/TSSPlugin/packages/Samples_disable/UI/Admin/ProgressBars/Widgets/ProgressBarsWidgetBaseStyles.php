<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ProgressBars\Widgets;

use ModulesGarden\TSSPlugin\Components\ProgressBar\ProgressBar;
use ModulesGarden\TSSPlugin\Components\ProgressBar\ProgressBarDanger;
use ModulesGarden\TSSPlugin\Components\ProgressBar\ProgressBarInfo;
use ModulesGarden\TSSPlugin\Components\ProgressBar\ProgressBarSuccess;
use ModulesGarden\TSSPlugin\Components\ProgressBar\ProgressBarWarning;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

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