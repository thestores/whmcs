<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Home\SimpleForm\Dropdowns;

use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Client;
use WHMCS\Database\Capsule as DB;


class Clients extends Dropdown implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadData(): void
    {
        $clients = Client::select(DB::raw('id as value'), DB::raw('CONCAT(firstname, " ", lastname) as name'))->where('firstname', 'LIKE', '%' . Request::get('query') . '%')
            ->get()
            ->toArray();

        $this->setOptions($clients);
    }

    public function loadHtml(): void
    {
        //$this->setName('clients');
        $this->setAjaxOnLoad();
        $this->setAjaxSearch();
        $this->setMultiple();
    }
}
