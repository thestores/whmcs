<?php

namespace ModulesGarden\tssmodule\Core\Storage;

use ModulesGarden\tssmodule\Core\ModuleConstants;

class Storage
{
    public static function path(...$params): string
    {
        return call_user_func_array([ModuleConstants::class, 'getFullPath'], array_merge(['storage'], $params));
    }
}
