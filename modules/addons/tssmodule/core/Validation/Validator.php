<?php

namespace ModulesGarden\tssmodule\Core\Validation;

use ModulesGarden\tssmodule\Core\Helper\Converter\ArrayFormat;

class Validator extends \Illuminate\Validation\Validator
{
    /**
     * Get the value of a given attribute.
     *
     * @param  string  $attribute
     * @return mixed
     */
    protected function getValue($attribute)
    {
        return parent::getValue(trim(ArrayFormat::parseKeyToDotedFormat($attribute), '.'));
    }
}