<?php

namespace ModulesGarden\tssmodule\Components\Form;

use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Core\Components\Traits\ToolbarTrait;

class Form extends AbstractForm
{
    use ToolbarTrait;

    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::simple($this);
    }
}