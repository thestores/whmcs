<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Helpers;

use ModulesGarden\TSSPlugin\Core\ModuleConstants;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;

class ProductConfiguration
{
    public static function isSupportedInRequest(): bool
    {
        return self::isSupported(Request::get('servertype', ''));
    }

    public static function isSupported(string $type): bool
    {
        return ModuleConstants::getModuleName() === $type;
    }

    public static function isRunAsProductAddon(): bool
    {
        return basename($_SERVER["SCRIPT_NAME"]) == "configaddons.php";
    }
}
