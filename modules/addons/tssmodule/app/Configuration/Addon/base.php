<?php
// phpcs:ignoreFile

use ModulesGarden\tssmodule\Core\App\AppContext;

if (!defined('WHMCS'))
{
    die('This file cannot be accessed directly');
}

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'AppContext.php';

function tssmodule_config()
{
    return (new AppContext())->runAddonModule(__FUNCTION__, []);
}

function tssmodule_activate()
{
    return (new AppContext())->runAddonModule(__FUNCTION__, []);
}

function tssmodule_deactivate()
{
    return (new AppContext())->runAddonModule(__FUNCTION__, []);
}

function tssmodule_upgrade($params)
{
    return (new AppContext())->runAddonModule(__FUNCTION__, $params);
}

function tssmodule_output($params)
{
    #MGLICENSE_CHECK_ECHO_AND_RETURN_MESSAGE#

    $html = (new AppContext())->runAddonModule(__FUNCTION__, $params);

    if (is_array($html))
    {
        echo json_encode($html);
    }
    elseif ($html)
    {
        echo $html;
    }
}

if (defined('CLIENTAREA'))
{
    function tssmodule_clientarea($params)
    {
        #MGLICENSE_CHECK_ECHO_AND_RETURN_MESSAGE#

        // Client's SSL certificates (summary filters) and "SSL Certificates by Domain" - plain Smarty pages
        require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Bootstrap.php';

        return \ModulesGarden\tssmodule\App\ClientArea\SslPages::render($_GET);
    }
}
