<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Providers;

use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\Http\BinaryFileResponse;
use ModulesGarden\TSSPlugin\Core\Http\Response;

class Provider extends CrudProvider
{
    public function read()
    {
        return (new BinaryFileResponse(__FILE__));
    }
}