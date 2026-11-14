<?php

namespace ModulesGarden\TSSPlugin\Components\Graph\Options;

use ModulesGarden\TSSPlugin\Components\Graph\Source\AbstractOption;

class XaxisOptions extends AbstractOption
{
    public $categories;

    public function __construct($categories = [])
    {
        $this->categories = $categories;
    }

    public function getAttributes():array
    {
        return [
            'categories' => $this->categories,
        ];
    }
}