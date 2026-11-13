<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\tssmodule\Core\Components\Actions\ModalClose;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;
use ModulesGarden\tssmodule\Core\Components\Response\Response;
use ModulesGarden\tssmodule\Core\DataProviders\CrudProvider;

class FormProvider extends CrudProvider
{
    public function create()
    {
        return (new Response())
            ->setActions([
                (new Reload((new DataTable())))->withParams([
                    'recordToAdd' => rand(0, 100)
                ]), new ModalClose()]);
    }
}