<?php

namespace ModulesGarden\TSSPlugin\Core\Packages\Database;

abstract class BasePatch implements PatchInterface
{
    public function requires(): array
    {
        return [];
    }
}