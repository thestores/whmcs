<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Home\Forms\Providers;

class FormWithWidgets extends \ModulesGarden\tssmodule\Core\DataProviders\CrudProvider
{
    public function create()
    {
        \ModulesGarden\tssmodule\Core\validator()->validate(\ModulesGarden\tssmodule\Core\Support\Facades\Request::getAll(), [
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
