<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets;

use ModulesGarden\tssmodule\Components\ProgressBar\ProgressBar;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Enums\BackgroundColor;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

class ProgressBarsWidgetStyles extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("All Styles Examples Progress Bars");

        $oClass = new \ReflectionClass(new BackgroundColor());

        foreach ($oClass->getConstants() as $type => $class) {
            $bar = (new ProgressBar())->setText($type)->setFill(rand(10,95))->setType($class);
            $this->addElement($bar);
        }
    }
}