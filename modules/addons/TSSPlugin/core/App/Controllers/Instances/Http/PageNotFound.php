<?php

namespace ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Http;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Core\UI\View;

//@todo refactor me
class PageNotFound extends View implements AdminAreaInterface, ClientAreaInterface
{
    public function __construct()
    {
        parent::__construct();

        $zero = new \ModulesGarden\TSSPlugin\Components\PageNotFound\PageNotFound();
        $this->addElement($zero);
    }
}
