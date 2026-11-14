<?php

namespace ModulesGarden\TSSPlugin\Core\Support\Facades;

/**
 * @method static get(string $name, $default = null)
 */
class Config extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\TSSPlugin\Core\Services\Config::class;
    }
}
