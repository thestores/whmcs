<?php

namespace ModulesGarden\tssmodule\Core\Helper;

use ModulesGarden\tssmodule\Core\Http\JsonResponse;
use ModulesGarden\tssmodule\Core\Http\RedirectResponse;
use ModulesGarden\tssmodule\Core\Http\Response;
use ModulesGarden\tssmodule\Core\ModuleConstants;
use ModulesGarden\tssmodule\Core\ServiceLocator;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Core\Support\Facades\Session;
use ModulesGarden\tssmodule\Core\UI\View;
use ModulesGarden\tssmodule\Core\UI\ViewAjax;
use ModulesGarden\tssmodule\Core\UI\ViewIntegrationAddon;

if (!function_exists('\ModulesGarden\tssmodule\Core\Helper\response'))
{
    /**
     * @param array $data
     * @return Response
     */
    function response(array $data = [])
    {
        return Response::create()->setData($data);
    }
}

if (!function_exists('\ModulesGarden\tssmodule\Core\Helper\redirect'))
{
    /**
     * @param array $data
     * @return JsonResponse
     */
    function redirect($controller = null, $action = null, array $params = [])
    {
        return RedirectResponse::createMG($controller, $action, $params);
    }
}


if (!function_exists('\ModulesGarden\tssmodule\Core\Helper\sl'))
{
    /**
     * @param string $class
     * @param string|null $method
     * @return object
     * @deprecated - use make
     */
    function sl($class, $method = null)
    {
        $return = null;

        if ($class != null && $method == null)
        {
            $return = ServiceLocator::call($class);
        }
        elseif ($class != null && $method != null)
        {
            $return = ServiceLocator::call($class, $method);
        }

        return $return;
    }
}

if (!function_exists('\ModulesGarden\tssmodule\Core\Helper\isAdmin'))
{
    /**
     * @return bool
     */
    function isAdmin(): bool
    {
        return defined('ADMINAREA') && Session::get('adminid');
    }
}

if (!function_exists('\ModulesGarden\tssmodule\Core\Helper\getAdminDirName'))
{
    /**
     * @return string
     */
    function getAdminDirName()
    {
        $fileName = 'configuration.php';
        $filePath = ModuleConstants::getFullPathWhmcs();

        global $customadminpath;
        if (!$customadminpath && file_exists($filePath . DIRECTORY_SEPARATOR . $fileName))
        {
            include_once $filePath . DIRECTORY_SEPARATOR . $fileName;
        }

        if ($customadminpath && is_string($customadminpath))
        {
            return $customadminpath;
        }

        return 'admin';
    }
}

if (!function_exists('\ModulesGarden\tssmodule\Core\Helper\view'))
{
    function view()
    {
        if (Request::get('ajax') && Request::get('namespace') != null && Request::get('namespace') != '' && Request::get('namespace') != 'undefined')
        {
            return new ViewAjax();
        }

        return new View();
    }
}

if (!function_exists('\ModulesGarden\tssmodule\Core\Helper\viewIntegrationAddon'))
{
    /**
     * View Integration Addon Controler
     *
     * @return ViewIntegrationAddon
     */
    function viewIntegrationAddon()
    {
        if (Request::get('ajax') && Request::get('namespace') != null && Request::get('namespace') != '' && Request::get('namespace') != 'undefined')
        {
            return new ViewAjax();
        }

        return new ViewIntegrationAddon();
    }
}

if (!function_exists('\ModulesGarden\tssmodule\Core\Helper\fire'))
{
    /**
     * @deprecated - use \ModulesGarden\tssmodule\Core\fire
     */
    function fire($event)
    {
        return \ModulesGarden\tssmodule\Core\fire($event);
    }
}
