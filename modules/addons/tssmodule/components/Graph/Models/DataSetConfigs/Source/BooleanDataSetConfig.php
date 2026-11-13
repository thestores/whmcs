<?php

namespace ModulesGarden\tssmodule\Components\Graph\Models\DataSetConfigs\Source;

abstract class BooleanDataSetConfig extends AbstractDataSetConfig
{
    public function __construct(bool $value)
    {
        $this->value = $value;
    }
}