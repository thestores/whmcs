<?php

namespace ModulesGarden\TSSPlugin\Core\Support\Facades;


class Smarty extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\TSSPlugin\Core\Services\Smarty::class;
    }
}
