<?php

namespace ModulesGarden\TSSPlugin\Components\Form;

use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;

abstract class AbstractFormConfigOptions extends AbstractForm
{
    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::twoColumns($this);
        $this->setContainerTag('div');
    }
}