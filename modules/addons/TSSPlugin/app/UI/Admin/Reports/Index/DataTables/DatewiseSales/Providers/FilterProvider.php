<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Providers;

use ModulesGarden\TSSPlugin\App\Libs\Helpers;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;
use ModulesGarden\TSSPlugin\Core\WHMCS\Helper;

class FilterProvider extends CrudProvider
{
    public function read()
    {
        $this->data        = $this->formData;
        $productOptions    = Helpers::getProductOptions();
        $productOptions[0] = $this->translate('all');

        $this->availableValues['productId'] = $productOptions;
        $this->availableValues['brand']     = array_merge(['0' => $this->translate('all')], Helpers::getBrandOptions());

        $this->availableValues['sslStatus'] = [
            '0'         => $this->translate('all'),
            'active'    => $this->translate('active'),
            'pending'   => $this->translate('pending'),
            'expired'   => $this->translate('expired'),
            'cancelled' => $this->translate('cancelled'),
        ];
    }
}