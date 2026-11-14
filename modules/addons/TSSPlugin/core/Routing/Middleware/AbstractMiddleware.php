<?php

namespace ModulesGarden\TSSPlugin\Core\Routing\Middleware;

use ModulesGarden\TSSPlugin\Core\Http\Request;

abstract class AbstractMiddleware
{
    public function __invoke(Request $request, \Closure $next)/*: \ModulesGarden\TSSPlugin\Core\Http\Response*/
    {
        return $next($request);
    }
}