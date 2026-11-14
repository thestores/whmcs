<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\Renewal\Providers;

use ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\Renewal\Forms\GetCsvForm;
use ModulesGarden\TSSPlugin\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\TSSPlugin\Core\Components\Response\Response;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;

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