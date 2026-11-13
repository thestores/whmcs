<?php

namespace ModulesGarden\tssmodule\Packages\Product\Http\Admin;

use ModulesGarden\tssmodule\Core\Contracts\Controllers\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Helper;
use ModulesGarden\tssmodule\Core\Http\AbstractController;
use ModulesGarden\tssmodule\Core\ModuleConstants;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Server;
use ModulesGarden\tssmodule\Packages\Product\Enums\ConfigSettings;
use function ModulesGarden\tssmodule\Core\Helper;

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
            ->addElement(\ModulesGarden\tssmodule\Packages\Product\UI\Buttons\ServerConfiguration::class);
    }
}
