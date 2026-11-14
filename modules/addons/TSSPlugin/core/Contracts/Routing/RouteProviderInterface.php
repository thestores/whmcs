<?php

namespace ModulesGarden\TSSPlugin\Core\Contracts\Routing;

use ModulesGarden\TSSPlugin\Core\Routing\Route;

interface RouteProviderInterface
{
    public function find(\Symfony\Component\HttpFoundation\Request $request, string $level) : ?Route;
}