<?php

namespace ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Http;

use ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;
use ModulesGarden\TSSPlugin\Core\UI\AbstractPartialView;
use ModulesGarden\TSSPlugin\Core\UI\View;
use ModulesGarden\TSSPlugin\Core\UI\Views\AddonModuleAdminArea;

class AdminPageController extends HttpController implements \ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface
{
    public function execute($params = null)
    {
        return \ModulesGarden\TSSPlugin\Core\Support\Facades\Smarty::view('adminarea', parent::run($params), ModuleConstants::getTemplateDir() . '/controllers');
    }

    protected function preResolveResponse()
    {
        if($this->controllerResult instanceof View)
        {
            $this->controllerResult = new AddonModuleAdminArea($this->controllerResult);
        }
    }
}
