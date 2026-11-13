<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\Instances\Http;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\tssmodule\Core\UI\View;

//@todo refactor me
class PageNotFound extends View implements AdminAreaInterface, ClientAreaInterface
{
    public function __construct()
    {
        parent::__construct();

        $zero = new \ModulesGarden\tssmodule\Components\PageNotFound\PageNotFound();
        $this->addElement($zero);
    }
}
