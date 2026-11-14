<?php

namespace ModulesGarden\TSSPlugin\App\Http\Admin;

use ModulesGarden\TSSPlugin\App\UI\Admin\Import\Index\ImportContainer;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Http\AbstractController;
use ModulesGarden\TSSPlugin\Core\Helper;

class Import extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(ImportContainer::class);
    }
}
