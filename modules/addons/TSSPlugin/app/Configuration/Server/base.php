<?php
// phpcs:ignoreFile

use ModulesGarden\TSSPlugin\Core\App\AppContext;

if (!defined('WHMCS'))
{
    die('This file cannot be accessed directly');
}

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'AppContext.php';

function TSSPlugin_CreateAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_SuspendAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_UnsuspendAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_TerminateAccount(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_ChangePassword(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_ChangePackage(array $params)
{
    #MGLICENSE_CHECK_RETURN#

    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_TestConnection(array $params)
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

function TSSPlugin_UsageUpdate(array $params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_ConfigOptions($params = [])
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_ServiceSingleSignon($params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_MetaData()
{
    return (new AppContext())->runServerModule(__FUNCTION__, []);
}

function TSSPlugin_AdminSingleSignOn($params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

function TSSPlugin_AdminServicesTabFields($params)
{
    return (new AppContext())->runServerModule(__FUNCTION__, $params);
}

if (defined('CLIENTAREA'))
{
    function TSSPlugin_ClientArea($params)
    {
        #MGLICENSE_CHECK_RETURN#

        return (new AppContext())->runServerModule(__FUNCTION__, $params);
    }
}