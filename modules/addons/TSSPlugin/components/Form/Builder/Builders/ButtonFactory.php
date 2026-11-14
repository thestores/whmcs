<?php

namespace ModulesGarden\TSSPlugin\Components\Form\Builder\Builders;

use ModulesGarden\TSSPlugin\Components\Container\ContainerFullWidth;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\FormFieldInterface;

class ButtonFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)
    {
        $formGroup = new ContainerFullWidth();
        $formGroup->addElement($formField);

        return $formGroup;
    }
}
