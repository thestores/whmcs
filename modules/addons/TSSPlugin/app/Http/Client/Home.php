<?php

namespace ModulesGarden\TSSPlugin\App\Http\Client;

use ModulesGarden\TSSPlugin\Core\Helper;
use ModulesGarden\TSSPlugin\Core\Http\AbstractClientController;
use ModulesGarden\TSSPlugin\Packages\Logs\UI\Pages\LogsDataTable;

/**
 * Description of Samples
 */
class Home extends AbstractClientController implements \ModulesGarden\TSSPlugin\Core\Contracts\Controllers\ClientAreaInterface
{
    public function index()
    {
        return Helper\view()
            ->addElement(\ModulesGarden\TSSPlugin\App\UI\Client\Home\Index\Container::class);
    }

    public function serviceInformation()
    {
        return Helper\view()
            ->addElement(\ModulesGarden\TSSPlugin\App\UI\Client\Home\ServiceInformation\Container::class);
    }
}
