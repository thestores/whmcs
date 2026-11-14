<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Products\Index\DataTables\Products\Providers;

use ModulesGarden\TSSPlugin\App\Libs\Helpers;
use ModulesGarden\TSSPlugin\App\Models\RemoteProduct;
use ModulesGarden\TSSPlugin\App\Repositories\Whmcs\ProductRepository;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Pricing;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Product;
use ModulesGarden\TSSPlugin\Packages\Product\Libs\ConfigurableOptions\Quantity;
use ModulesGarden\TSSPlugin\Packages\Product\Libs\ConfigurableOptions\SubOption\SubOption;
use ModulesGarden\TSSPlugin\Packages\Product\Services\ConfigurableOptions;

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