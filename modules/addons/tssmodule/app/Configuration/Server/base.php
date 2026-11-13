<?php
// phpcs:ignoreFile

use ModulesGarden\tssmodule\Core\App\AppContext;

if (!defined('WHMCS'))
{
    die('This file cannot be accessed directly');
}

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'AppContext.php';

function tssmodule_CreateAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_SuspendAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_UnsuspendAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_TerminateAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_ChangePassword(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_ChangePackage(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_TestConnection(array $params)
{
    try
    {
        #MGLICENSE_CHECK_THROW_EXCEPTION#
    }
    catch (\Exception $ex)
    {
        return [
            'error' => $ex->getMessage()
        ];
    }

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_UsageUpdate(array $params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_ConfigOptions($params = [])
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_ServiceSingleSignon($params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_MetaData()
{
    return (new AppContext())->runServerModule(__FUNCTION__, []);
}

function tssmodule_AdminSingleSignOn($params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function tssmodule_AdminServicesTabFields($params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

if (defined('CLIENTAREA'))
{
    function tssmodule_ClientArea($params)
    {
        #MGLICENSE_CHECK_RETURN#

        return (new AppContext())->runServerModule(__FUNCTION__, $params);
    }
}