<?php

namespace ModulesGarden\TSSPlugin\App\Http\Admin;

use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\StatisticsContainer;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Http\AbstractController;
use ModulesGarden\TSSPlugin\Core\Helper;
use function ModulesGarden\TSSPlugin\Core\Helper;

class Statistics extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(StatisticsContainer::class);
    }
}
