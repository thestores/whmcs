<?php

namespace ModulesGarden\TSSPlugin\Core\App\Controllers\AppControllers;

use ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Http\AdminPageController;
use ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Http\ClientPageController;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AppControllerInterface;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;

class Http extends \ModulesGarden\TSSPlugin\Core\App\Controllers\AppController implements AppControllerInterface
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
