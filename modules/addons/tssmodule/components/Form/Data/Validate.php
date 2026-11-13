<?php

namespace ModulesGarden\tssmodule\Components\Form\Data;

use function ModulesGarden\tssmodule\Core\validator;

class Validate
{
    public function run(array $elements)
    {
        $validatableElementsBag = new ValidatableElementsBag($elements);

        $input = array_merge(
            \ModulesGarden\tssmodule\Core\Support\Facades\Request::get('formData', []),
            \ModulesGarden\tssmodule\Core\Support\Facades\Request::files()->get('formData', [])
        );

        validator()->validate(
            $input ?? [],
            $validatableElementsBag->getValidators(),
            $validatableElementsBag->getCustomAttributes(),
            $validatableElementsBag->getCustomValues()
        );
    }
}
