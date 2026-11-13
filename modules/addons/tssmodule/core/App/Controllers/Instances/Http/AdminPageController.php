<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\Instances\Http;

use ModulesGarden\tssmodule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\tssmodule\Core\ModuleConstants;
use ModulesGarden\tssmodule\Core\UI\AbstractPartialView;
use ModulesGarden\tssmodule\Core\UI\View;
use ModulesGarden\tssmodule\Core\UI\Views\AddonModuleAdminArea;

class AdminPageController extends HttpController implements \ModulesGarden\tssmodule\Core\Contracts\Controllers\AdminAreaInterface
{
    public function execute($params = null)
    {
        return \ModulesGarden\tssmodule\Core\Support\Facades\Smarty::view('adminarea', parent::run($params), ModuleConstants::getTemplateDir() . '/controllers');
    }

    protected function preResolveResponse()
    {
        if($this->controllerResult instanceof View)
        {
            $this->controllerResult = new AddonModuleAdminArea($this->controllerResult);
        }
    }
}
