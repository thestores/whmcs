<?php

namespace ModulesGarden\tssmodule\Components\RadioButton;

use ModulesGarden\tssmodule\Core\Components\FormFields\FormField;
use ModulesGarden\tssmodule\Core\Components\Traits\OptionsTrait;
use ModulesGarden\tssmodule\Core\Contracts\Components\AvailableOptionsInterface;

class RadioButton extends FormField implements AvailableOptionsInterface
{
    use OptionsTrait;

    public const COMPONENT = 'RadioButton';
}
