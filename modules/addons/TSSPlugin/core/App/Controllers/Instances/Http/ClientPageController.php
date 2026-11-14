<?php

namespace ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Http;

use ModulesGarden\TSSPlugin\App\Hooks\InternalHooks\PreClientAreaPageLoad;
use ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;
use ModulesGarden\TSSPlugin\Core\Routing\Url;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Breadcrumbs;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Translator;
use ModulesGarden\TSSPlugin\Core\UI\View;
use ModulesGarden\TSSPlugin\Core\UI\Views\AddonModuleClientArea;

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
                'content' => \ModulesGarden\TSSPlugin\Core\Support\Facades\Smarty::view('clientarea', $vars, ModuleConstants::getTemplateDir() . '/controllers')
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
