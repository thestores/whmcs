<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetBaseStyles;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetSmall;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetMedium;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetLarge;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsWidgetStyles;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ProgressBars\Widgets\ProgressBarsNoLabelWithMarks;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface
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