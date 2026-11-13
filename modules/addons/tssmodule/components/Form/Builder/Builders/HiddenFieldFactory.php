<?php

namespace ModulesGarden\tssmodule\Components\Form\Builder\Builders;

use ModulesGarden\tssmodule\Core\Contracts\Components\FormFieldInterface;

class HiddenFieldFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)//: FormFieldInterface
    {
        return $formField;
    }
}
