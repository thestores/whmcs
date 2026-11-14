<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\AjaxSearch\Fields;

use ModulesGarden\TSSPlugin\Components\Dropdown\Dropdown;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Client;

class ClientsSearchField extends Dropdown
{
    public function __construct()
    {
        parent::__construct();
        $this->setName('clientsField');
    }

    public function loadHtml(): void
    {
        $this->setAjaxSearch();
        $this->setMultiple();
    }

    public function loadData(): void
    {
        $availableValues = [];
        $query           = Client::select("id", "firstname", "lastname", "companyname", "email");

        $query->whereIn('id', [(int)Request::get('query')]);

        foreach ($query->get() as $client)
        {
            $availableValues[] = ["value" => $client->id, "name" => sprintf("#%s %s %s (%s)", $client->id, $client->firstname, $client->lastname, $client->email)];
        }

        $this->setOptions($availableValues);
    }
}