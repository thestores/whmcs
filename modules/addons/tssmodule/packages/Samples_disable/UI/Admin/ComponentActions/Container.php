<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComponentActions;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\AccordionWidget;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\CollapsableBox\Widgets\BaseWidget;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Widgets\Widget;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Widget());
    }
}