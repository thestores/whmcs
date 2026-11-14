<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists;

use ModulesGarden\TSSPlugin\Components\ElementsList\ElementsList as ElementsListComponent;
use ModulesGarden\TSSPlugin\Components\Text\Text;
use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\DataProviders\QueryDataProvider;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Client;

class ElementsList extends ElementsListComponent implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadData(): void
    {
        $clients = Client::select('tblclients.id', 'tblclients.firstname', 'lastname', 'taxexempt', 'companyname');

        $dataProv = new QueryDataProvider($clients);
        $dataProv->setColumns([
            (new \ModulesGarden\TSSPlugin\Core\DataProviders\Column('id'))->setSearchable(true),
            (new \ModulesGarden\TSSPlugin\Core\DataProviders\Column('firstname'))->setSearchable(true),
        ]);
        $dataProv->setDefaultSorting('tblclients.id', 'DESC');
        $this->setDataProvider($dataProv);
        $this->setAjaxData(['rand' . rand(0, 100) => 1]);
    }

    protected function buildElement($record): AbstractComponent
    {
        return (new Text())->setText($record->firstname);
    }
}