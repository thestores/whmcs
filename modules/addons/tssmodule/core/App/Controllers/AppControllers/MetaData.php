<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\AppControllers;

use ModulesGarden\tssmodule\Core\App\Controllers\Instances\AddonController;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\AppControllerInterface;
use ModulesGarden\tssmodule\Core\ModuleConstants;

class MetaData extends \ModulesGarden\tssmodule\Core\App\Controllers\AppController implements AppControllerInterface
{
    public function __construct(array $params = [])
    {
        //override parent, do not populate params
    }
    public function getControllerInstanceClass($callerName, $params)
    {
        $functionName = str_replace(ModuleConstants::getModuleName() . '_', '', $callerName);

        $coreAddon = '\ModulesGarden\tssmodule\Core\App\Controllers\Instances\Addon\\' . ucfirst($functionName);
        if (class_exists($coreAddon) && is_subclass_of($coreAddon, AddonController::class))
        {
            return $coreAddon;
        }

        $appAddon = '\ModulesGarden\tssmodule\App\Http\Actions\\' . ucfirst($functionName);
        if (class_exists($appAddon) && is_subclass_of($appAddon, AddonController::class))
        {
            return $appAddon;
        }

        return null;
    }
}
