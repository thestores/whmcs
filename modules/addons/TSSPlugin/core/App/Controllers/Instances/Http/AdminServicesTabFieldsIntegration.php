<?php

namespace ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Http;

use ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Http\Response;

class AdminServicesTabFieldsIntegration extends HttpController implements AdminAreaInterface
{
    protected $templateDir = null;
    protected $templateName = 'adminServicesTabFieldsIntegration';

    public function execute($response = null)
    {
        $this->setControllerResult($response);

        if (!$this->controllerResult)
        {
            return '';
        }

        return ['' => $this->resolveResponse()];
    }

    public function resolveResponse()
    {
        if ($this->controllerResult instanceof Response)
        {
            $this->controllerResult->setForceHtml();
        }

        return $this->responseResolver->setResponse($this->controllerResult)
            ->setTemplateName($this->getTemplateName())
            ->setTemplateDir($this->getTemplateDir())
            ->setPageController($this)
            ->resolve();
    }
}
