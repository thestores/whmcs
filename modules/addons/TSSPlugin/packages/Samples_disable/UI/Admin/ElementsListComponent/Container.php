<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists\ElementsList;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists\WordPressSampleList;

class Container extends \ModulesGarden\TSSPlugin\Components\Container\Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new WordPressSampleList());
        $this->addElement(new ElementsList());
    }
}