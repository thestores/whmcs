<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Home\Tabs\Tabs;

use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;


class Tab extends \ModulesGarden\tssmodule\Components\Tab\Tab implements \ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface, AjaxOnLoadInterface
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
