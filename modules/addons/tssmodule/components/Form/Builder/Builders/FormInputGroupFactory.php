<?php

namespace ModulesGarden\tssmodule\Components\Form\Builder\Builders;

use ModulesGarden\tssmodule\Components\FormLabel\FormLabel;
use ModulesGarden\tssmodule\Components\Tooltip\Tooltip;
use ModulesGarden\tssmodule\Core\Contracts\Components\FormFieldInterface;

class FormInputGroupFactory extends AbstractFormFieldFactory
{
    public function create(FormFieldInterface $formField)
    {
        $formField->appendCss('lu-form-control');

        $label = new FormLabel();
        $label->setCss('lu-form-label');
        $label->setText($this->title);

        if (!empty($this->description))
        {
            $icon = new Tooltip();
            $icon->setTitle($this->description);
            $label->addElement($icon);
        }

        $formGroup = $this->createContainer();
        $formGroup->addElement($label);
        $formGroup->addElement($formField);
        $formGroup->setFieldName($formField->getName());

        return $formGroup;
    }
}
