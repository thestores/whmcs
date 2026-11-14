<?php

namespace ModulesGarden\TSSPlugin\Components\Form\Data;

use function ModulesGarden\TSSPlugin\Core\validator;

class Validate
{
    public function run(array $elements)
    {
        $validatableElementsBag = new ValidatableElementsBag($elements);

        $input = array_merge(
            \ModulesGarden\TSSPlugin\Core\Support\Facades\Request::get('formData', []),
            \ModulesGarden\TSSPlugin\Core\Support\Facades\Request::files()->get('formData', [])
        );

        validator()->validate(
            $input ?? [],
            $validatableElementsBag->getValidators(),
            $validatableElementsBag->getCustomAttributes(),
            $validatableElementsBag->getCustomValues()
        );
    }
}
