<?php

namespace ModulesGarden\TSSPlugin\Core\Support\Facades;

class Store extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\TSSPlugin\Core\Services\Store::class;
    }
}