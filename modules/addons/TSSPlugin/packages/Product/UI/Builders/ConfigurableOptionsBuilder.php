<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\UI\Builders;

use ModulesGarden\TSSPlugin\Components\Container\ContainerColumn;
use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Components\Form\Builder\Builder;
use ModulesGarden\TSSPlugin\Components\FormGroup\FormGroup;
use ModulesGarden\TSSPlugin\Components\FormGroup\FormGroupFullWidth;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\FormFieldInterface;
use ModulesGarden\TSSPlugin\Packages\Product\UI\GroupBuilders\ConfigOptionSwitcherBuilder;

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