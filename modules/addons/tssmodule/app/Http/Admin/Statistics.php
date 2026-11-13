<?php

namespace ModulesGarden\tssmodule\App\Http\Admin;

use ModulesGarden\tssmodule\App\UI\Admin\Statistics\Index\StatisticsContainer;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Http\AbstractController;
use ModulesGarden\tssmodule\Core\Helper;
use function ModulesGarden\tssmodule\Core\Helper;

class Statistics extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(StatisticsContainer::class);
    }
}
