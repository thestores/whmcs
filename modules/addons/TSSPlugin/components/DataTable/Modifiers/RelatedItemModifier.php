<?php

namespace ModulesGarden\TSSPlugin\Components\DataTable\Modifiers;

use ModulesGarden\TSSPlugin\Core\UI\Formatters\RelatedItem\RelatedItem;

class RelatedItemModifier extends RelatedItem
{
    public function __invoke($fieldName, $row, $fieldValue, $raw)
    {
        return self::formatFromData($row);
    }
}