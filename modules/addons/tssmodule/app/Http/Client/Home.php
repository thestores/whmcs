<?php

namespace ModulesGarden\tssmodule\App\Http\Client;

use ModulesGarden\tssmodule\Core\Helper;
use ModulesGarden\tssmodule\Core\Http\AbstractClientController;
use ModulesGarden\tssmodule\Packages\Logs\UI\Pages\LogsDataTable;

/**
 * Description of Samples
 */
class Home extends AbstractClientController implements \ModulesGarden\tssmodule\Core\Contracts\Controllers\ClientAreaInterface
{
    public function index()
    {
        return Helper\view()
            ->addElement(\ModulesGarden\tssmodule\App\UI\Client\Home\Index\Container::class);
    }

    public function serviceInformation()
    {
        return Helper\view()
            ->addElement(\ModulesGarden\tssmodule\App\UI\Client\Home\ServiceInformation\Container::class);
    }
}
