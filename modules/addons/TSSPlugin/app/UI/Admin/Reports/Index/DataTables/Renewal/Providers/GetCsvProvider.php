<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\Renewal\Providers;

use ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\Shared\RecordsProvider;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;

class GetCsvProvider extends CrudProvider
{
    /** the columns of this report's table */
    const FIELDS = ['date', 'storeId', 'clientDetails', 'productDetails', 'type', 'brand', 'status', 'issueDate', 'expirationDate'];

    public function read()
    {
        (new RecordsProvider())->outputCsv($this->formData, self::FIELDS, false);
        die();
    }
}
