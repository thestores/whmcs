<?php

namespace ModulesGarden\tssmodule\Core\Support\Facades;


/**
 * @see \ModulesGarden\tssmodule\Core\Services\Messages
 * @method static alert(string $message)
 * @method static toast(string $message)
 * @method static flash(string $message)
 */
class Messages extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\tssmodule\Core\Services\Messages::class;
    }
}
