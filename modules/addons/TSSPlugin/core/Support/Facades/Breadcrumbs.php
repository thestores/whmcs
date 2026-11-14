<?php

namespace ModulesGarden\TSSPlugin\Core\Support\Facades;


use ModulesGarden\TSSPlugin\Core\UI\Breadcrumbs\Item;

/**
 * @method static add(Item $item);
 * @method static set(array $items);
 * @method static get();
 * @method static delete(int $index);
 * @method static clear();
 * @method static addSuffixToLast(string $text);
 * @method static addPrefixToLast(string $text);
 */
class Breadcrumbs extends AbstractFacade
{
    protected static function getFacadeAccessor(): string
    {
        return \ModulesGarden\TSSPlugin\Core\Services\Breadcrumbs::class;
    }
}
