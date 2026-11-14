<?php

namespace ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Server;

use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;

class ClientPageProductAddonController extends ClientPageController implements ClientAreaInterface
{
    public function execute($params = null)
    {
        return \ModulesGarden\TSSPlugin\Core\Support\Facades\Smarty::view('clientarea', parent::run($params), ModuleConstants::getTemplateDir() . '/controllers');
    }
}