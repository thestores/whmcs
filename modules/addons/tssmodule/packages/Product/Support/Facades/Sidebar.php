<?php

namespace ModulesGarden\tssmodule\Packages\Product\Support\Facades;

use ModulesGarden\tssmodule\Core\Support\Facades\AbstractFacade;
use ModulesGarden\tssmodule\Packages\Product\Services\Sidebar as SidebarService;

/**
 * @method static getByName(string $item)
 * @method static array getAll()
 */
class Sidebar extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return SidebarService::class;
    }
}