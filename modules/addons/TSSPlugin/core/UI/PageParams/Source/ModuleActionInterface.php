<?php

namespace ModulesGarden\TSSPlugin\Core\UI\PageParams\Source;

interface ModuleActionInterface
{
    public function selectAppropriateParameters(array $params): array;
}