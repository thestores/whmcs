<?php

namespace ModulesGarden\TSSPlugin\Core\Validation\Rules;

use ModulesGarden\TSSPlugin\Core\Contracts\Validation\ImplicitRuleInterface;

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