<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComponentActions\DownloadFile\Providers;

use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Http\BinaryFileResponse;
use ModulesGarden\tssmodule\Core\Http\Response;

class Provider extends CrudProvider
{
    public function read()
    {
        return (new BinaryFileResponse(__FILE__));
    }
}