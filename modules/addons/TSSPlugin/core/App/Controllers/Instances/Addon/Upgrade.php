<?php

namespace ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Addon;

use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AddonControllerInterface;
use ModulesGarden\TSSPlugin\Core\Module\Addon;
use ModulesGarden\TSSPlugin\Core\Support\Facades\LogActivity;

class Upgrade extends \ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\AddonController implements AddonControllerInterface
{
    public function execute($params = []): array
    {
        try
        {
            Addon::upgrade($params);

            return ['status' => 'success'];
        }
        catch (\Throwable $exc)
        {
            LogActivity::error($exc->getMessage());

            return [
                'status'      => 'error',
                'description' => $exc->getMessage(),
            ];
        }
    }
}
