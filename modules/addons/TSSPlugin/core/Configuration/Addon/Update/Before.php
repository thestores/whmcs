<?php

namespace ModulesGarden\TSSPlugin\Core\Configuration\Addon\Update;

use ModulesGarden\TSSPlugin\Core\Configuration\Addon\AbstractBefore;

/**
 * runs after module update actions
 */
class Before extends AbstractBefore
{
    /**
     * @return array
     */
    public function execute($version)
    {
        return [];
    }
}
