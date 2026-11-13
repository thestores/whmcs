<?php

namespace ModulesGarden\tssmodule\Core\Components\FormFields;

use ModulesGarden\tssmodule\Core\Contracts\Components\FormFieldInterface;

class AbstractDecorator implements FormFieldInterface
{
    protected FormField $field;

    public function __construct(FormField $field)
    {
        $this->field = $field;
    }

    public function getName(): string
    {
        return $this->field->getName();
    }
}