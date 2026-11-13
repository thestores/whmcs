<?php

namespace ModulesGarden\tssmodule\Packages\Product\Integrations;

use ModulesGarden\tssmodule\Core\Hook\AbstractHookIntegrationController;
use ModulesGarden\tssmodule\Packages\Product\Http\Admin\ServerConfig;

class ServerConfigurationIntegration extends AbstractHookIntegrationController
{
    public function __construct()
    {
        $this->addIntegration('configservers',
            ['action' => 'manage'],
            [ServerConfig::class, 'index'],
            '#serverHash',
            self::TYPE_AFTER,
            self::INSERT_TYPE_FULL);
    }
}