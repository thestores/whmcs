<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComponentActions;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CollapsableBox\Widgets\AccordionWidget;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CollapsableBox\Widgets\BaseWidget;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Widgets\Widget;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Widget());
    }
}