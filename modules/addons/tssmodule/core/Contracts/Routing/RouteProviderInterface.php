<?php

namespace ModulesGarden\tssmodule\Core\Contracts\Routing;

use ModulesGarden\tssmodule\Core\Routing\Route;

interface RouteProviderInterface
{
    public function find(\Symfony\Component\HttpFoundation\Request $request, string $level) : ?Route;
}