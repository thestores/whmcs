<?php

namespace ModulesGarden\tssmodule\App\Http\Actions;

use ModulesGarden\tssmodule\Core\App\Controllers\Instances\Server\Action;
use ModulesGarden\tssmodule\Packages\Samples\Http\Admin\Samples;

class AdminServicesTabFields extends Action
{
    public function execute($params = null)
    {
        return [Samples::class, 'samplesIntegration'];
    }
}
