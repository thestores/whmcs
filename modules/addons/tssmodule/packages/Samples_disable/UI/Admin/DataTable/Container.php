<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
//        $this->addElement(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\QueryDataProvider\DataTable());
//        $this->addElement(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\ArrayDataProvider\DataTable());
//        $this->addElement(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Tabs\TabsWidget());
        $this->addElement(new StaticAjaxData\Container());
    }
}