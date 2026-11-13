<?php

namespace ModulesGarden\tssmodule\Core\Routing\Middleware;

use ModulesGarden\tssmodule\Core\Http\Request;

abstract class AbstractMiddleware
{
    public function __invoke(Request $request, \Closure $next)/*: \ModulesGarden\tssmodule\Core\Http\Response*/
    {
        return $next($request);
    }
}