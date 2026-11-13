<?php

namespace ModulesGarden\tssmodule\Components\HiddenField;

use ModulesGarden\tssmodule\Core\Components\FormFields\FormField;
use ModulesGarden\tssmodule\Core\Contracts\Components\FormFieldHiddenInterface;

class HiddenField extends FormField implements FormFieldHiddenInterface
{
    public const COMPONENT = 'HiddenField';
}
