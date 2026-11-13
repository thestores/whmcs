<?php

namespace ModulesGarden\tssmodule\Packages\Product\UI\Builders;

use ModulesGarden\tssmodule\Components\Container\ContainerColumn;
use ModulesGarden\tssmodule\Components\Form\AbstractForm;
use ModulesGarden\tssmodule\Components\Form\Builder\Builder;
use ModulesGarden\tssmodule\Components\FormGroup\FormGroup;
use ModulesGarden\tssmodule\Components\FormGroup\FormGroupFullWidth;
use ModulesGarden\tssmodule\Core\Contracts\Components\FormFieldInterface;
use ModulesGarden\tssmodule\Packages\Product\UI\GroupBuilders\ConfigOptionSwitcherBuilder;

class ConfigurableOptionsBuilder extends Builder
{
    public function __construct(AbstractForm $form)
    {
        parent:: __construct($form);
        $this->setDefaultFormGroup(new FormGroupFullWidth());
        $this->addDefaultContainer(new ContainerColumn());
    }

    public function createGroup(FormFieldInterface $field, bool $showTooltip = true, FormGroup $formGroup = null)
    {
        return (new ConfigOptionSwitcherBuilder($this, $this->form, $this->defaultFormGroup))->build($field, $showTooltip, $formGroup);
    }
}