<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\UI\GroupBuilders;

use ModulesGarden\TSSPlugin\Components\Form\Builder\GroupBuilders\DefaultBuilder;
use ModulesGarden\TSSPlugin\Packages\Product\UI\FieldFactories\ConfigOptionSwitcherFactory;

class ConfigOptionSwitcherBuilder extends DefaultBuilder
{
    protected function findBuilder($name): string
    {
        return ConfigOptionSwitcherFactory::class;
    }
}