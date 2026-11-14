<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ProgressBars;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetBaseStyles;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetSmall;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetMedium;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetLarge;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetStyles;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsNoLabelWithMarks;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new ProgressBarsWidgetSmall());
        $this->addElement(new ProgressBarsWidgetMedium());
        $this->addElement(new ProgressBarsWidgetLarge());
        $this->addElement(new ProgressBarsWidgetBaseStyles());
        $this->addElement(new ProgressBarsNoLabelWithMarks());
        $this->addElement(new ProgressBarsWidgetStyles());
    }
}