<?php

namespace ModulesGarden\TSSPlugin\Core\Routing\Middleware\Processors;

use ModulesGarden\TSSPlugin\Core\Http\Request;
use ModulesGarden\TSSPlugin\Core\Routing\Route;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;

class Controller
{
    public function run(Route $route, Request $request, callable $caller)
    {
        $next = fn($request) => $caller();

        foreach (Config::get('middlewares', []) as $middleware)
        {
            $next = fn($request) => $middleware($request, $next);
        }

        return $next($request);
    }
}