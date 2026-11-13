<?php

namespace ModulesGarden\tssmodule\Core\App\Controllers\Instances\Addon;

use ModulesGarden\tssmodule\Core\Configuration\Data;
use ModulesGarden\tssmodule\Core\Contracts\Controllers\AddonControllerInterface;

/**
 * Module configuration wrapper
 */
class Config extends \ModulesGarden\tssmodule\Core\App\Controllers\Instances\AddonController implements AddonControllerInterface
{
    public function execute($params = [])
    {
        return [
            'name'        => \ModulesGarden\tssmodule\Core\Support\Facades\Config::get('configuration.systemName'),
            'description' => \ModulesGarden\tssmodule\Core\Support\Facades\Config::get('configuration.description'),
            'version'     => \ModulesGarden\tssmodule\Core\Support\Facades\Config::get('configuration.version'),
            'author'      => \ModulesGarden\tssmodule\Core\Support\Facades\Config::get('configuration.author'),
            'fields'      => \ModulesGarden\tssmodule\Core\Support\Facades\Config::get('configuration.fields', [])
        ];
    }
}
