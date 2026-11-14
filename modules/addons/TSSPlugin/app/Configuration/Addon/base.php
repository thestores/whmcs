<?php
// phpcs:ignoreFile

use ModulesGarden\TSSPlugin\Core\App\AppContext;

if (!defined('WHMCS'))
{
    die('This file cannot be accessed directly');
}

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'App' . DIRECTORY_SEPARATOR . 'AppContext.php';

function TSSPlugin_config()
{
    TSSPlugin_adoptAnOlderInstall();

    return (new AppContext())->runAddonModule(__FUNCTION__, []);
}

/**
 * An install made before 1.4.0 lived in a folder of another name, and before 1.3.0 its tables were named after
 * that folder too. Both are moved over before anything else runs, so the schema finds the tables that are there
 * and WHMCS finds the products this module provisions.
 */
function TSSPlugin_adoptAnOlderInstall()
{
    $libs = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'Libs' . DIRECTORY_SEPARATOR;
    require_once $libs . 'Edition.php';
    require_once $libs . 'TablePrefix.php';
    require_once $libs . 'ModuleRename.php';

    foreach (['TablePrefix', 'ModuleRename'] as $step)
    {
        try
        {
            call_user_func(['\\ModulesGarden\\TSSPlugin\\App\\Libs\\' . $step, 'migrate']);
        }
        catch (\Throwable $e)
        {
            // an install that cannot be moved over keeps working on what it has; the next run tries again
        }
    }
}

function TSSPlugin_activate()
{
    TSSPlugin_adoptAnOlderInstall();

    return (new AppContext())->runAddonModule(__FUNCTION__, []);
}

function TSSPlugin_deactivate()
{
    return (new AppContext())->runAddonModule(__FUNCTION__, []);
}

function TSSPlugin_upgrade($params)
{
    TSSPlugin_adoptAnOlderInstall();

    return (new AppContext())->runAddonModule(__FUNCTION__, $params);
}

function TSSPlugin_output($params)
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
    function TSSPlugin_clientarea($params)
    {
        #MGLICENSE_CHECK_ECHO_AND_RETURN_MESSAGE#

        // Client's SSL certificates (summary filters) and "SSL Certificates by Domain" - plain Smarty pages
        require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Bootstrap.php';

        return \ModulesGarden\TSSPlugin\App\ClientArea\SslPages::render($_GET);
    }
}
