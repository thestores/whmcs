<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\Instances\Server;

use ModulesGarden\tssmodule\App\Hooks\InternalHooks\PreClientAreaPageLoad;
use ModulesGarden\tssmodule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\tssmodule\Core\ModuleConstants;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Core\Support\Facades\Router;
use ModulesGarden\tssmodule\Core\Support\Facades\Translator;
use ModulesGarden\tssmodule\Core\UI\View;
use ModulesGarden\tssmodule\Core\UI\Views\ServerModuleClientArea;

class ClientPageController extends HttpController implements ClientAreaInterface
{
    public function execute($params = null)
    {
        $data             = parent::run($params);

        $templateType     = Router::getCurrentRoute()->is(Config::get('configuration.clientAreaController'), 'index') ? 'templatefile' : 'tabOverviewReplacementTemplate';
        $baseTemplateFile = 'resources/whmcs/clientarea';
        $templateFilePath = ModuleConstants::getModuleType() == 'addons' ? '../../../modules/addons/'.ModuleConstants::getModuleName().'/' . $baseTemplateFile : $baseTemplateFile;

        return [
            'pagetitle'    => Translator::get(Config::get('configuration.clientAreaName', ModuleConstants::getModuleName())),
            'breadcrumb'   => [],
            $templateType  => $templateFilePath,
            'requirelogin' => true,
            'forcessl'     => false,
            'vars'         => [
                'content' => \ModulesGarden\tssmodule\Core\Support\Facades\Smarty::view('clientarea', $data, ModuleConstants::getTemplateDir() . '/controllers')
            ]
        ];
    }

    protected function preResolveResponse()
    {
        if ($this->controllerResult instanceof View)
        {
            $this->controllerResult = new ServerModuleClientArea($this->controllerResult);
        }
    }
}
