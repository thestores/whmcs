<?php

namespace ModulesGarden\TSSPlugin\App\Http\Actions;

use ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Server\Action;
use ModulesGarden\TSSPlugin\Packages\Samples\Http\Admin\Samples;

class AdminServicesTabFields extends Action
{
    public function execute($params = null)
    {
        return [Samples::class, 'samplesIntegration'];
    }
}
