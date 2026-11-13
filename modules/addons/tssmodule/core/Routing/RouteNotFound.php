<?php

namespace ModulesGarden\tssmodule\Core\Routing;

class RouteNotFound extends Route
{
    public function __construct()
    {
        $this->name = '404';
    }
}