<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Forms\Forms\Forms;

use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;


class FormTwoColumnsElements extends AbstractFormElements implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::twoColumns($this);
    }
}
