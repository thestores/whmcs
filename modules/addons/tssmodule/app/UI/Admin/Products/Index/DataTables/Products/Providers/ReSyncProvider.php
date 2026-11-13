<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Products\Index\DataTables\Products\Providers;

use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\App\Models\RemoteProduct;
use ModulesGarden\tssmodule\App\Repositories\Whmcs\ProductRepository;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Pricing;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Product;
use ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\Quantity;
use ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\SubOption\SubOption;
use ModulesGarden\tssmodule\Packages\Product\Services\ConfigurableOptions;

class ReSyncProvider extends CrudProvider
{
    public function read()
    {
        $this->data = $this->formData;
    }

    public function create()
    {
        Helpers::reSyncProducts();
    }
}