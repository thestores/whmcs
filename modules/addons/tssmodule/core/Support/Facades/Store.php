<?php

namespace ModulesGarden\tssmodule\Core\Support\Facades;

class Store extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\tssmodule\Core\Services\Store::class;
    }
}