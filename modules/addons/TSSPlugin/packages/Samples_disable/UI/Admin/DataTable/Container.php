<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
//        $this->addElement(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\QueryDataProvider\DataTable());
//        $this->addElement(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\ArrayDataProvider\DataTable());
//        $this->addElement(new \ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Tabs\TabsWidget());
        $this->addElement(new StaticAjaxData\Container());
    }
}