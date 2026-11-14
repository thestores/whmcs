<?php

namespace ModulesGarden\TSSPlugin\Core\Http\Admin;

use ModulesGarden\TSSPlugin\Core\Http\AbstractController;

class PageNotFound extends AbstractController
{
    public function index()
    {
        $pageControler = new \ModulesGarden\TSSPlugin\Core\App\Controllers\Http\PageNotFound();

        return $pageControler->execute();
    }
}
