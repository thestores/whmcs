<?php

namespace ModulesGarden\tssmodule\Core\Support\Facades;

class Dispatcher extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\tssmodule\Core\Events\Dispatcher::class;
    }
}
