<?php

namespace ModulesGarden\TSSPlugin\Core\Support\Facades;

class Dispatcher extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\TSSPlugin\Core\Events\Dispatcher::class;
    }
}
