<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalClose;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Reload;
use ModulesGarden\TSSPlugin\Core\Components\Response\Response;
use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;

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