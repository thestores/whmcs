<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Integrations;

use ModulesGarden\TSSPlugin\Core\Hook\AbstractHookIntegrationController;
use ModulesGarden\TSSPlugin\Packages\Product\Http\Admin\ServerConfig;

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