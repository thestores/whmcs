<?php

namespace ModulesGarden\TSSPlugin\Core\UI\PageParams\ModuleActions;

use ModulesGarden\TSSPlugin\Core\UI\PageParams\Source\ModuleActionInterface;

class DefaultAction implements ModuleActionInterface
{

    public function selectAppropriateParameters(array $params): array
    {
        return [];
    }
}