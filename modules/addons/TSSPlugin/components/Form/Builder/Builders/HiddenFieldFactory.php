<?php

namespace ModulesGarden\TSSPlugin\Components\Form\Builder\Builders;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\FormFieldInterface;

class HiddenFieldFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)//: FormFieldInterface
    {
        return $formField;
    }
}
