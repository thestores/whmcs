<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\AppControllers;

use ModulesGarden\tssmodule\Core\App\Controllers\Instances\Http\AdminPageController;
use ModulesGarden\tssmodule\Core\App\Controllers\Instances\Http\ClientPageController;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\AppControllerInterface;
use ModulesGarden\tssmodule\Core\ModuleConstants;

class Http extends \ModulesGarden\tssmodule\Core\App\Controllers\AppController implements AppControllerInterface
{
    public function getControllerInstanceClass($callerName, $params)
    {
        $functionName = strtolower(str_replace(ModuleConstants::getModuleName() . '_', '', $callerName));
        switch ($functionName)
        {
            //HTTP controllers
            case 'output':
                return AdminPageController::class;
            case 'clientarea':
                return ClientPageController::class;
        }

        return null;
    }
}
