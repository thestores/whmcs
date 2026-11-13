<?php

namespace ModulesGarden\tssmodule\Components\ConfigurationVendorSelect;

use ModulesGarden\tssmodule\Core\Components\FormFields\FormField;
use ModulesGarden\tssmodule\Core\Components\Traits\OptionsTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\AvailableOptionsInterface;

class ConfigurationVendorSelect extends FormField implements AvailableOptionsInterface
{
    use OptionsTrait;

    public const COMPONENT = 'ConfigurationVendorSelect';
}
