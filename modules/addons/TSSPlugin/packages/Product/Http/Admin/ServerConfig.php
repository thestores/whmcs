<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\Http\Admin;

use ModulesGarden\TSSPlugin\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Helper;
use ModulesGarden\TSSPlugin\Core\Http\AbstractController;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Server;
use ModulesGarden\TSSPlugin\Packages\Product\Enums\ConfigSettings;
use function ModulesGarden\TSSPlugin\Core\Helper;

class ServerConfig extends AbstractController implements AdminAreaInterface
{
    public function index()
    {
        if (!Config::get(ConfigSettings::PRODUCT_SERVER_CONFIG_FORM)) {
            return;
        }

        $serverId = Request::get('id', null);
        if (is_null($serverId)) {
            return;
        }

        $server = Server::findOrFail($serverId);
        if (ModuleConstants::getModuleName() !== $server->type) {
            return;
        }

        return Helper\viewIntegrationAddon()
            ->addElement(\ModulesGarden\TSSPlugin\Packages\Product\UI\Buttons\ServerConfiguration::class);
    }
}
