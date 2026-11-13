<?php

namespace ModulesGarden\tssmodule\Components\DataTable\Modifiers;

use ModulesGarden\tssmodule\Core\UI\Formatters\RelatedItem\RelatedItem;

class RelatedItemModifier extends RelatedItem
{
    public function __invoke($fieldName, $row, $fieldValue, $raw)
    {
        return self::formatFromData($row);
    }
}