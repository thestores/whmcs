<?php

namespace ModulesGarden\tssmodule\Core\Support\Facades;

/**
 * @method static call(object $obj, string $name)
 */
class Binder extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\tssmodule\Core\Services\Binder::class;
    }
}
