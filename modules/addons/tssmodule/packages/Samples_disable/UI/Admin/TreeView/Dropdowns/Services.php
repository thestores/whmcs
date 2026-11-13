<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\Dropdowns;

use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Client;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Hosting;
use WHMCS\Database\Capsule as DB;


class Services extends Dropdown implements AdminAreaInterface, AjaxComponentInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('service_id');
        $this->setName('service_id');
    }

    public function loadHtml(): void
    {
        //$this->setName('clients');
//        $this->setAjaxOnLoad();
//        $this->setAjaxSearch();
        $this->setMultiple();

    }

    public function loadData(): void
    {
        $clients = Hosting::select(DB::raw('id as value'), DB::raw('domain as name'))->where('userid', (int) Request::get('ajaxData')['value'] ?? null)
            ->get()
            ->toArray();

        $this->setOptions($clients);
    }
}
