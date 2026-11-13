<?php

namespace ModulesGarden\tssmodule\Core\Http\Admin;

use ModulesGarden\tssmodule\Core\Http\AbstractController;

class PageNotFound extends AbstractController
{
    public function index()
    {
        $pageControler = new \ModulesGarden\tssmodule\Core\App\Controllers\Http\PageNotFound();

        return $pageControler->execute();
    }
}
