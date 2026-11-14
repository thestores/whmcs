<?php

namespace ModulesGarden\TSSPlugin\Core\Exporters\DataModels;

use ModulesGarden\TSSPlugin\Core\Exporters\Source\DataModelInterface;

class Query extends Collection implements DataModelInterface
{
    public function __construct($query)
    {
        parent::__construct($query->get());
    }
}