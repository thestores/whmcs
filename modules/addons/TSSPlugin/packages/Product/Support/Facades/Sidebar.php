<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Support\Facades;

use ModulesGarden\TSSPlugin\Core\Support\Facades\AbstractFacade;
use ModulesGarden\TSSPlugin\Packages\Product\Services\Sidebar as SidebarService;

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