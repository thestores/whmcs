<?php

namespace ModulesGarden\tssmodule\Core\Support\Facades;

/**
 *  @method static run(string $command, array $values = [], string $userName = ''))
 */
class WhmcsApi extends AbstractFacade
{

    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\tssmodule\Core\WHMCS\API\API::class;
    }
}