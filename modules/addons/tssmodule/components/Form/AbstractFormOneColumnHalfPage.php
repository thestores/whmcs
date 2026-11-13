<?php

namespace ModulesGarden\tssmodule\Components\Form;

use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;

abstract class AbstractFormOneColumnHalfPage extends AbstractForm
{
    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::oneColumnHalfPage($this);
    }
}