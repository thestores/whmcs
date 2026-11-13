<?php

namespace ModulesGarden\tssmodule\Packages\Product\Helpers;

class ConfigurableOptionHelper
{
    public static function parseConfigOptionName($optionName):string
    {
        return explode('|', (string)$optionName)[0];
    }
}