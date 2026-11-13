<?php

namespace ModulesGarden\tssmodule\Packages\Product\UI\GroupBuilders;

use ModulesGarden\tssmodule\Components\Form\Builder\GroupBuilders\DefaultBuilder;
use ModulesGarden\tssmodule\Packages\Product\UI\FieldFactories\ConfigOptionSwitcherFactory;

class ConfigOptionSwitcherBuilder extends DefaultBuilder
{
    protected function findBuilder($name): string
    {
        return ConfigOptionSwitcherFactory::class;
    }
}