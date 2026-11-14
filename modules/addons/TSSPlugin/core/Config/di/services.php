<?php

use ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Addon\Config;
use ModulesGarden\TSSPlugin\Core\DependencyInjection\PackageServices;
use ModulesGarden\TSSPlugin\Core\Events\Dispatcher;
use ModulesGarden\TSSPlugin\Core\Lang\Lang;
use ModulesGarden\TSSPlugin\Core\Services\Breadcrumbs;
use ModulesGarden\TSSPlugin\Core\Services\Messages;
use ModulesGarden\TSSPlugin\Core\Services\Route;
use ModulesGarden\TSSPlugin\Core\Services\Translator;
use ModulesGarden\TSSPlugin\Core\Services\Validator;
use ModulesGarden\TSSPlugin\Core\Session\Session;

return [
    Dispatcher::class,

    //New
    Translator::class,
    Validator::class,
    PackageServices::class,
    \ModulesGarden\TSSPlugin\Core\Services\Params::class,
    Session::class,
    Breadcrumbs::class,
    Messages::class,
    \ModulesGarden\TSSPlugin\Core\Services\Router::class,
    \ModulesGarden\TSSPlugin\Core\Services\Smarty::class,
    \ModulesGarden\TSSPlugin\Core\Services\Request::class,
    \ModulesGarden\TSSPlugin\Core\Services\Config::class,
    \ModulesGarden\TSSPlugin\Core\Services\Binder::class,
    \ModulesGarden\TSSPlugin\Core\Services\Menu::class,
    Lang::class,
    \ModulesGarden\TSSPlugin\Core\Services\Store::class
];
