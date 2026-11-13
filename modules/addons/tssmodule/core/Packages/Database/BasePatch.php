<?php

namespace ModulesGarden\tssmodule\Core\Packages\Database;

abstract class BasePatch implements PatchInterface
{
    public function requires(): array
    {
        return [];
    }
}