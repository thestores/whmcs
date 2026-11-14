<?php

namespace ModulesGarden\TSSPlugin\Components\Graph\Models\DataSetConfigs;

use ModulesGarden\TSSPlugin\Components\Graph\Models\DataSetConfigs\Source\StringDataSetConfig;

class CubicInterpolationMode extends StringDataSetConfig
{
    public const DEFAULT = "default";
    public const MONOTONE = "monotone";
}