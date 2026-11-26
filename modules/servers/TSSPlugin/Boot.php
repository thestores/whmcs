<?php

/**
 * Loads the classes of the server module: TSSPlugin\Server\app\Client\Home is app/Client/Home.php. The addon's
 * classes (TSSPlugin\App\...) come from the addon's own loader, required here too.
 * Required by every entry point of the server module (TSSPlugin.php, hooks.php) and by addon code that uses a
 * server module class. Nothing else happens here.
 */

if(!defined('WHMCS'))
{
    http_response_code(403);
    exit;
}

if(!defined('TSSPLUGIN_SERVER_BOOTED'))
{
    define('TSSPLUGIN_SERVER_BOOTED', true);

    $addonBoot = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'addons' . DIRECTORY_SEPARATOR . basename(__DIR__) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Kernel' . DIRECTORY_SEPARATOR . 'Boot.php';
    if(is_file($addonBoot))
    {
        require_once $addonBoot;
    }
    unset($addonBoot);

    spl_autoload_register(function($class) {
        $prefix = 'TSSPlugin\\Server\\';
        if(strncmp($class, $prefix, strlen($prefix)) !== 0)
        {
            return;
        }
        $file = __DIR__ . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, substr($class, strlen($prefix))) . '.php';
        if(is_file($file))
        {
            require_once $file;
        }
    });
}
