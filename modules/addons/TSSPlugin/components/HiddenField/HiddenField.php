<?php

namespace ModulesGarden\TSSPlugin\Components\HiddenField;

use ModulesGarden\TSSPlugin\Core\Components\FormFields\FormField;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\FormFieldHiddenInterface;

class HiddenField extends FormField implements FormFieldHiddenInterface
{
    public const COMPONENT = 'HiddenField';
}
