<?php

namespace ModulesGarden\tssmodule\Core\Exporters\DataModels;

use ModulesGarden\tssmodule\Core\Exporters\Source\DataModelInterface;

class Query extends Collection implements DataModelInterface
{
    public function __construct($query)
    {
        parent::__construct($query->get());
    }
}