<?php

namespace ModulesGarden\tssmodule\Core\Support\Facades;


/**
 * @method static getCurrentRoute : \ModulesGarden\tssmodule\Core\Routing\Route
 */
class Router extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\tssmodule\Core\Services\Router::class;
    }
}
