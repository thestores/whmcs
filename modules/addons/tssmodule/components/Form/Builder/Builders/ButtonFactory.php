<?php

namespace ModulesGarden\tssmodule\Components\Form\Builder\Builders;

use ModulesGarden\tssmodule\Components\Container\ContainerFullWidth;
use ModulesGarden\tssmodule\Core\Contracts\Components\FormFieldInterface;

class ButtonFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)
    {
        $formGroup = new ContainerFullWidth();
        $formGroup->addElement($formField);

        return $formGroup;
    }
}
