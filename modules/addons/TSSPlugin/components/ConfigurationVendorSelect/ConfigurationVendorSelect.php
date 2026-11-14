<?php

namespace ModulesGarden\TSSPlugin\Components\ConfigurationVendorSelect;

use ModulesGarden\TSSPlugin\Core\Components\FormFields\FormField;
use ModulesGarden\TSSPlugin\Core\Components\Traits\OptionsTrait;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AvailableOptionsInterface;

class ConfigurationVendorSelect extends FormField implements AvailableOptionsInterface
{
    use OptionsTrait;

    public const COMPONENT = 'ConfigurationVendorSelect';
}
