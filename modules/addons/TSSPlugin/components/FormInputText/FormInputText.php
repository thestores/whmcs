<?php

namespace ModulesGarden\TSSPlugin\Components\FormInputText;

use ModulesGarden\TSSPlugin\Core\Components\FormFields\FormField;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ActionOnChangeTrait;

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
