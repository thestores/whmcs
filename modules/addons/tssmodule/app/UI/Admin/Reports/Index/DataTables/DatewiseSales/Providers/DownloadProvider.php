<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Providers;

use ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\DatewiseSales\Forms\GetCsvForm;
use ModulesGarden\tssmodule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\tssmodule\Core\Components\Response\Response;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;

class DownloadProvider extends CrudProvider
{
    public function read()
    {
        $this->data = $this->formData;
    }

    public function create()
    {
        return (new Response())
            ->setSuccess($this->translate('csvExportedSuccessfully'))
            ->setActions([
                             new DownloadFileFromForm(new GetCsvForm(), $this->formData->toArray()),
                         ]);
    }
}