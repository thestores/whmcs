<?php

namespace ModulesGarden\tssmodule\Components\FormInputText;

use ModulesGarden\tssmodule\Core\Components\FormFields\FormField;
use ModulesGarden\tssmodule\Core\Components\Traits\ActionOnChangeTrait;

/**
 * Class IconButton
 */
class FormInputText extends FormField
{
    public const COMPONENT = 'FormInputText';

    public function setType(string $type): self
    {
        $this->setSlot('type', $type);

        return $this;
    }
}
