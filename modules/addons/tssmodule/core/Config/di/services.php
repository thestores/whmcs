<?php

use ModulesGarden\tssmodule\Core\App\Controllers\Instances\Addon\Config;
use ModulesGarden\tssmodule\Core\DependencyInjection\PackageServices;
use ModulesGarden\tssmodule\Core\Events\Dispatcher;
use ModulesGarden\tssmodule\Core\Lang\Lang;
use ModulesGarden\tssmodule\Core\Services\Breadcrumbs;
use ModulesGarden\tssmodule\Core\Services\Messages;
use ModulesGarden\tssmodule\Core\Services\Route;
use ModulesGarden\tssmodule\Core\Services\Translator;
use ModulesGarden\tssmodule\Core\Services\Validator;
use ModulesGarden\tssmodule\Core\Session\Session;

return [
    Dispatcher::class,

    //New
    Translator::class,
    Validator::class,
    PackageServices::class,
    \ModulesGarden\tssmodule\Core\Services\Params::class,
    Session::class,
    Breadcrumbs::class,
    Messages::class,
    \ModulesGarden\tssmodule\Core\Services\Router::class,
    \ModulesGarden\tssmodule\Core\Services\Smarty::class,
    \ModulesGarden\tssmodule\Core\Services\Request::class,
    \ModulesGarden\tssmodule\Core\Services\Config::class,
    \ModulesGarden\tssmodule\Core\Services\Binder::class,
    \ModulesGarden\tssmodule\Core\Services\Menu::class,
    Lang::class,
    \ModulesGarden\tssmodule\Core\Services\Store::class
];
