<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Import\Index\Providers;

use ModulesGarden\TSSPlugin\App\UI\Admin\Import\Index\Forms\GetCsvForm;
use ModulesGarden\TSSPlugin\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\TSSPlugin\Core\Components\Response\Response;
use WHMCS\Database\Capsule;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;


class TemplateDownloadProvider extends CrudProvider
{
    public function read()
    {

    }


    public function create()
    {
        return (new Response())
            ->setSuccess($this->translate('success'))
            ->setActions([
                             new DownloadFileFromForm(new GetCsvForm(), $this->formData->toArray()),
                         ]);
    }
}