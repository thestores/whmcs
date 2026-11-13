<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Providers;

use ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Forms\GetCsvForm;
use ModulesGarden\tssmodule\Core\Components\Actions\DownloadFileFromForm;
use ModulesGarden\tssmodule\Core\Components\Response\Response;
use WHMCS\Database\Capsule;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;


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