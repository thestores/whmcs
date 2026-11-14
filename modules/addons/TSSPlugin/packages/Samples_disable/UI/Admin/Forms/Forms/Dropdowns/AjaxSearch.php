<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\Forms\Forms\Dropdowns;

use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;

class AjaxSearch extends Dropdown
{
    public function loadHtml(): void
    {
        $this->setAjaxSearch();
        $this->setName('Ajax Search');
    }

    public function loadData(): void
    {
        $searchFor = Request::get('query');

        $this->setOptions([
            [
                'value' => 1,
                'name'  => 'XXXX',
            ],
            [
                'value' => 2,
                'name'  => 'YYYY',
            ],
        ]);
    }
}