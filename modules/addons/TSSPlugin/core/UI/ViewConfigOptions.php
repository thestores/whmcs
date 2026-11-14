<?php

namespace ModulesGarden\TSSPlugin\Core\UI;

use ModulesGarden\TSSPlugin\Core\Exceptions\UserException;
use ModulesGarden\TSSPlugin\Core\Helper\BuildUrl;
use ModulesGarden\TSSPlugin\Core\UI\PageParams\ExtraParams;
use ModulesGarden\TSSPlugin\Core\Helper\RandomStringGenerator;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Store;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Messages;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Core\UI\View\AlertsBuilder;
use ModulesGarden\TSSPlugin\Core\UI\View\NavBarBuilder;

/**
 * Integration Addon View Controller
 */
class ViewConfigOptions extends View
{
    protected $template = 'configoptions';

    public function getResponse()
    {
        try
        {
            //@todo - refactor me!
            if (Request::get('ajax'))
            {
                foreach ($this->getElements() as $element)
                {
                    $viewAjax = new ViewAjax();
                    $viewAjax->addElement($element);

                    return $viewAjax->getResponse();
                }
            }

            return \ModulesGarden\TSSPlugin\Core\Support\Facades\Smarty::view($this->template, [
                'rootElements'    => json_encode([
                    'navbar' => $this->buildRootElements([(new NavBarBuilder())->createProductConfiguration()])[0],
                    //                'breadcrumb' => (new BreadcrumbsBuilder())->create(),//$this->buildRootElements([])[0],
                    'body'   => $this->buildRootElements($this->elements),
                    'alerts' => (new AlertsBuilder())->create()
                ]),
                'currentUrl'      => BuildUrl::currentUrl(),
                'componentsUrl'   => BuildUrl::getComponentsURL(),
                'extraParams'     => json_encode(ExtraParams::getForCurrentAction()),
                'assetsURL'       => BuildUrl::getAssetsURL(),
                'customAssetsURL' => BuildUrl::getAssetsURL(true),
                'vueInstanceName' => (new RandomStringGenerator(32))->genRandomString(ModuleConstants::getModuleName()),
                'vueStoreData'    => json_encode(Store::toArray()),
                'moduleName'      => ModuleConstants::getModuleName(),
                'moduleVersion'   => \ModulesGarden\TSSPlugin\Core\Support\Facades\Config::get('configuration.version'),
            ], ModuleConstants::getTemplateDir() . '/controllers');

        }
        catch (UserException $ex)
        {

            Messages::alert($ex->getMessage());

            return \ModulesGarden\TSSPlugin\Core\Support\Facades\Smarty::view($this->template, [
                'rootElements'    => json_encode([
                    'alerts' => (new AlertsBuilder())->create()
                ]),
                'currentUrl'      => BuildUrl::currentUrl(),
                'componentsUrl'   => BuildUrl::getComponentsURL(),
                'extraParams'     => json_encode(ExtraParams::getForCurrentAction()),
                'assetsURL'       => BuildUrl::getAssetsURL(),
                'customAssetsURL' => BuildUrl::getAssetsURL(true),
                'vueInstanceName' => (new RandomStringGenerator(32))->genRandomString(ModuleConstants::getModuleName()),
                'vueStoreData'    => json_encode(Store::toArray()),
                'moduleName'      => ModuleConstants::getModuleName(),
                'moduleVersion'   => \ModulesGarden\TSSPlugin\Core\Support\Facades\Config::get('configuration.version'),
            ], ModuleConstants::getTemplateDir() . '/controllers');
        }
    }
}
