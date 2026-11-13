<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets;

use ModulesGarden\tssmodule\Components\ProgressBar\ProgressBar;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Enums\Size;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ProgressBarsWidgetMedium extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Medium Progress Bars");

        $bar10 = (new ProgressBar())->setText("Memory (1024/3000 MB)")->setFill(10)->setSize(Size::MEDIUM);
        $bar30 = (new ProgressBar())->setText("vCPU (2/12 Cores)")->setFill(30)->setSize(Size::MEDIUM);
        $bar60 = (new ProgressBar())->setText("Disks (8/100 GiB)")->setFill(60); //Medium is default
        $bar80 = (new ProgressBar())->setText("Networks (3/4)")->setFill(80);

        $this->addElement($bar30);
        $this->addElement($bar80);
        $this->addElement($bar60);
        $this->addElement($bar10);
    }
}