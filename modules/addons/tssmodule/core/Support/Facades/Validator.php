<?php

namespace ModulesGarden\tssmodule\Core\Support\Facades;


/**
 * @method static validate(array $data, array $rules, array $customAttributes = [], array $customValues = []);
 */
class Validator extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\tssmodule\Core\Services\Validator::class;
    }
}
