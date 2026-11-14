<?php

namespace ModulesGarden\TSSPlugin\Core\Traits;

use ModulesGarden\TSSPlugin\Core\ServiceLocator;

/**
 * Description of IsDebugOn
 *
 * @deprecated
 */
trait IsDebugOn
{
    public function isDebugOn()
    {
        return \ModulesGarden\TSSPlugin\Core\Support\Facades\Config::get('configuration.debug');
    }
}
