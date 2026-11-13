<?php

namespace ModulesGarden\tssmodule\Core\Support\Facades;

/**
 * @method static get(string $name, $default = null)
 */
class Config extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\tssmodule\Core\Services\Config::class;
    }
}
