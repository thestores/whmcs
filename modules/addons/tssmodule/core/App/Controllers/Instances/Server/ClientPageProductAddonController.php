<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\Instances\Server;

use ModulesGarden\tssmodule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\tssmodule\Core\ModuleConstants;

class ClientPageProductAddonController extends ClientPageController implements ClientAreaInterface
{
    public function execute($params = null)
    {
        return \ModulesGarden\tssmodule\Core\Support\Facades\Smarty::view('clientarea', parent::run($params), ModuleConstants::getTemplateDir() . '/controllers');
    }
}