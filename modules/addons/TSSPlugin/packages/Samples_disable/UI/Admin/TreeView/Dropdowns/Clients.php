<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\Dropdowns;

use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Core\Components\Actions\PassAjaxData;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadById;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Client;
use WHMCS\Database\Capsule as DB;


class Clients extends Dropdown implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('client_id');
        $this->setName('client_id');
    }

    public function loadHtml(): void
    {
        //$this->setName('clients');
        $this->setAjaxOnLoad();
        $this->setAjaxSearch();
        $this->onChange(new PassAjaxData('service_id'));
        $this->onChange(new ReloadById('service_id'));
    }

    public function loadData(): void
    {
        $clients = Client::select(DB::raw('id as value'), DB::raw('CONCAT(firstname, " ", lastname) as name'))->where('firstname', 'LIKE', '%' . Request::get('query') . '%')
            ->get()
            ->toArray();

        $this->setOptions($clients);
    }
}
