<?php

namespace ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\Addon;

use ModulesGarden\TSSPlugin\Core\Configuration\Data;
use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AddonControllerInterface;

/**
 * Module configuration wrapper
 */
class Config extends \ModulesGarden\TSSPlugin\Core\App\Controllers\Instances\AddonController implements AddonControllerInterface
{
    public function execute($params = [])
    {
        return [
            'name'        => \ModulesGarden\TSSPlugin\Core\Support\Facades\Config::get('configuration.systemName'),
            'description' => \ModulesGarden\TSSPlugin\Core\Support\Facades\Config::get('configuration.description'),
            'version'     => \ModulesGarden\TSSPlugin\Core\Support\Facades\Config::get('configuration.version'),
            'author'      => \ModulesGarden\TSSPlugin\Core\Support\Facades\Config::get('configuration.author'),
            'fields'      => \ModulesGarden\TSSPlugin\Core\Support\Facades\Config::get('configuration.fields', [])
        ];
    }
}
