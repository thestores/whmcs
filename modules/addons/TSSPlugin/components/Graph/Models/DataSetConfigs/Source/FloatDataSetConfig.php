<?php

namespace ModulesGarden\TSSPlugin\Components\Graph\Models\DataSetConfigs\Source;

use ModulesGarden\TSSPlugin\Components\Graph\Models\DataSetConfigs\Source\AbstractDataSetConfig;

abstract class FloatDataSetConfig extends AbstractDataSetConfig
{
    public function __construct(float $value)
    {
        $this->value = $value;
    }
}