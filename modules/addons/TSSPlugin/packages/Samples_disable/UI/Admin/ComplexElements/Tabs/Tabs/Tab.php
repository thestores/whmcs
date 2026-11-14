<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Home\Tabs\Tabs;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;


class Tab extends \ModulesGarden\TSSPlugin\Components\Tab\Tab implements \ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface, AjaxOnLoadInterface
{
    public function loadData(): void
    {
        $this->setContent('load data! <pre>' . print_r((Request::getFacadeRoot())->getAll(), true));
    }

    public function loadHtml(): void
    {
        $this->setTitle(rand(0, 100));
        $this->setContent('load html!');
    }
}
