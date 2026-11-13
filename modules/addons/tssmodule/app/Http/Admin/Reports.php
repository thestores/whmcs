<?php

namespace ModulesGarden\tssmodule\App\Http\Admin;

use ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\ReportsContainer;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Http\AbstractController;
use ModulesGarden\tssmodule\Core\Helper;

class Reports extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(ReportsContainer::class);
    }
}
