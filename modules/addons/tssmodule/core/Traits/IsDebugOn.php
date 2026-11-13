<?php

namespace ModulesGarden\tssmodule\Core\Traits;

use ModulesGarden\tssmodule\Core\ServiceLocator;

/**
 * Description of IsDebugOn
 *
 * @deprecated
 */
trait IsDebugOn
{
    public function isDebugOn()
    {
        return \ModulesGarden\tssmodule\Core\Support\Facades\Config::get('configuration.debug');
    }
}
