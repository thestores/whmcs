<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists\ElementsList;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists\WordPressSampleList;

class Container extends \ModulesGarden\tssmodule\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new WordPressSampleList());
        $this->addElement(new ElementsList());
    }
}