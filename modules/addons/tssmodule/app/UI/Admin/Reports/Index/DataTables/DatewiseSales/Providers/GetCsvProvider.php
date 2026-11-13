<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Providers;

use ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\Shared\RecordsProvider;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;

class GetCsvProvider extends CrudProvider
{
    /** the columns of this report's table */
    const FIELDS = ['date', 'storeId', 'clientDetails', 'productDetails', 'type', 'brand', 'status', 'salesAmount', 'cost', 'payment', 'paymentStatus'];

    public function read()
    {
        (new RecordsProvider())->outputCsv($this->formData, self::FIELDS, false);
        die();
    }
}
