<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Home\Forms\Providers;

class FormWithWidgets extends \ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider
{
    public function create()
    {
        \ModulesGarden\TSSPlugin\Core\validator()->validate(\ModulesGarden\TSSPlugin\Core\Support\Facades\Request::getAll(), [
            'text'     => '',
            'dropdown' => 'required',
        ]);
        // TODO: Implement create() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function read()
    {
        // TODO: Implement read() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
