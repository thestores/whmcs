<?php

namespace ModulesGarden\tssmodule\Core\Validation\Rules;

use ModulesGarden\tssmodule\Core\Contracts\Validation\ImplicitRuleInterface;

class Sample implements ImplicitRuleInterface
{
    public function passes($attribute, $value)
    {
        return false;
    }

    public function message()
    {
        return '';
    }
}