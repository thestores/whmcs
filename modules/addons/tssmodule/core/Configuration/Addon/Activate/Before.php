<?php

namespace ModulesGarden\tssmodule\Core\Configuration\Addon\Activate;

use ModulesGarden\tssmodule\Core\Configuration\Addon\AbstractBefore;
use ModulesGarden\tssmodule\Core\ModuleConstants;
use ModulesGarden\tssmodule\Core\ServiceLocator;

/**
 * Runs before module activation actions
 */
class Before extends AbstractBefore
{
    /**
     * @param array $params
     * @return array
     */
    public function execute(array $params = [])
    {
        return $params;
    }
}
