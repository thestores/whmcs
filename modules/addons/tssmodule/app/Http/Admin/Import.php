<?php

namespace ModulesGarden\tssmodule\App\Http\Admin;

use ModulesGarden\tssmodule\App\UI\Admin\Import\Index\ImportContainer;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Http\AbstractController;
use ModulesGarden\tssmodule\Core\Helper;

class Import extends AbstractController implements AdminAreaInterface
{

    public function index()
    {
        return Helper\view()
            ->addElement(ImportContainer::class);
    }
}
