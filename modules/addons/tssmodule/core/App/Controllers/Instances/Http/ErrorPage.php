<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\Instances\Http;

use ModulesGarden\tssmodule\Core\App\Controllers\Instances\HttpController;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\ClientAreaInterface;
use ModulesGarden\tssmodule\Core\Http\JsonResponse;
use ModulesGarden\tssmodule\Core\Support\Facades\Params;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Core\UI\View;

//@todo refactor
class ErrorPage extends HttpController implements AdminAreaInterface, ClientAreaInterface
{
    public function execute($params = null)
    {
        Params::createFrom((array)$params);

        return $this->resolveResponse();
    }

    public function resolveResponse()
    {
        if (Request::get('ajax'))
        {
            return (new JsonResponse())->withError(Params::get('exception')->getMessage());
        }
        else
        {
            $error = new \ModulesGarden\tssmodule\Components\BlockError\BlockError();
            $error->setException(Params::get('exception'));

            $view = new View();
            $view->addElement($error);

            return $view;
        }
    }
}
