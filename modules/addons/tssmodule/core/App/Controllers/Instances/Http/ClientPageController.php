<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\Instances\Http;

use ModulesGarden\tssmodule\App\Hooks\InternalHooks\PreClientAreaPageLoad;
use ModulesGarden\tssmodule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\tssmodule\Core\ModuleConstants;
use ModulesGarden\tssmodule\Core\Routing\Url;
use ModulesGarden\tssmodule\Core\Support\Facades\Breadcrumbs;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Core\Support\Facades\Translator;
use ModulesGarden\tssmodule\Core\UI\View;
use ModulesGarden\tssmodule\Core\UI\Views\AddonModuleClientArea;

class ClientPageController extends HttpController implements ClientAreaInterface
{
    public function execute($params = null)
    {
        $vars = parent::run($params);

        return [
            'pagetitle'    => Translator::get(Config::get('configuration.clientAreaName', ModuleConstants::getModuleName())),
            'breadcrumb'   => $this->getBreadcrumbs(),
            'templatefile' => 'resources/whmcs/clientarea',
            'requirelogin' => true,
            'forcessl'     => false,
            'vars'         => [
                'content' => \ModulesGarden\tssmodule\Core\Support\Facades\Smarty::view('clientarea', $vars, ModuleConstants::getTemplateDir() . '/controllers')
            ]
        ];
    }

    protected function preResolveResponse()
    {
        if ($this->controllerResult instanceof View)
        {
            $this->controllerResult = new AddonModuleClientArea($this->controllerResult);
        }
    }

    protected function getBreadcrumbs(): array
    {
        $breadcrumbs = [
            Url::route() => Translator::get(Config::get('configuration.clientAreaName'))
        ];

        foreach (Breadcrumbs::get() as $breadcrumb)
        {
            $breadcrumbs[$breadcrumb->getUrl()] = Translator::get($breadcrumb->getName());
        }

        return $breadcrumbs;
    }
}
