<?php

namespace ModulesGarden\TSSPlugin\Core\Support\Facades;


/**
 * @method static getCurrentRoute : \ModulesGarden\TSSPlugin\Core\Routing\Route
 */
class Router extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\TSSPlugin\Core\Services\Router::class;
    }
}
