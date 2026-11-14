<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CopyToTarget\Widgets;

use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\CopyToTarget\Forms\BaseForm;

class BaseWidget extends Widget implements AjaxComponentInterface, AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setTitle("Copy To Target Sample");

        $this->addElement(new BaseForm());
    }
}