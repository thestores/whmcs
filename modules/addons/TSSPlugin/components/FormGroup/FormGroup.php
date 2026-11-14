<?php

namespace ModulesGarden\TSSPlugin\Components\FormGroup;

use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\FormFieldInterface;

class FormGroup extends Container implements FormFieldInterface
{
    public const COMPONENT = 'FormGroup';

 

    public function getName(): string
    {
        return '';
        // TODO: Implement getName() method.
    }

    public function setError($error)
    {
        $this->setSlot('error', $error);
    }

    public function setFieldName($fieldName)
    {
        $this->setSlot('fieldName', $fieldName);
    }
}
