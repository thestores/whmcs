<?php

namespace ModulesGarden\TSSPlugin\Core\Support\Facades;

/**
 * @method static call(object $obj, string $name)
 */
class Binder extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\TSSPlugin\Core\Services\Binder::class;
    }
}
