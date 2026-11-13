<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\Instances\Addon;

use ModulesGarden\tssmodule\Core\Contracts\Controllers\AddonControllerInterface;
use ModulesGarden\tssmodule\Core\Module\Addon;
use ModulesGarden\tssmodule\Core\Support\Facades\LogActivity;

class Upgrade extends \ModulesGarden\tssmodule\Core\App\Controllers\Instances\AddonController implements AddonControllerInterface
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
