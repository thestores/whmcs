<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\KanbanBoard\Providers;

use ModulesGarden\TSSPlugin\Core\DataProviders\CrudProvider;

class BoardProvider extends CrudProvider
{
    public function update()
    {
        //print_r($this->formData);
        throw new \Exception('Not implemented');
    }
}