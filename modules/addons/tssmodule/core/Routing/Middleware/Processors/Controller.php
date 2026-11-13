<?php

namespace ModulesGarden\tssmodule\Core\Routing\Middleware\Processors;

use ModulesGarden\tssmodule\Core\Http\Request;
use ModulesGarden\tssmodule\Core\Routing\Route;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;

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