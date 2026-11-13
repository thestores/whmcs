<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Providers;

use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;
use ModulesGarden\tssmodule\Core\WHMCS\Helper;

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