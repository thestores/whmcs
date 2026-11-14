<?php

namespace ModulesGarden\TSSPlugin\Components\Tooltip;

use ModulesGarden\TSSPlugin\Components\Icon\Icon;

/**
 * Class Form
 */
class Tooltip extends Icon
{
    public const COMPONENT = 'Tooltip';

    public function __construct()
    {
        parent::__construct();

        $this->setIcon('help-circle-outline');
    }
}
