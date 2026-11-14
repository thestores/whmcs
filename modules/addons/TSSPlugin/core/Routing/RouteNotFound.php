<?php

namespace ModulesGarden\TSSPlugin\Core\Routing;

class RouteNotFound extends Route
{
    public function __construct()
    {
        $this->name = '404';
    }
}