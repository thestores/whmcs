<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists;

use ModulesGarden\tssmodule\Components\ElementsList\ElementsList as ElementsListComponent;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\DataProviders\QueryDataProvider;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Client;

class ElementsList extends ElementsListComponent implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadData(): void
    {
        $clients = Client::select('tblclients.id', 'tblclients.firstname', 'lastname', 'taxexempt', 'companyname');

        $dataProv = new QueryDataProvider($clients);
        $dataProv->setColumns([
            (new \ModulesGarden\tssmodule\Core\DataProviders\Column('id'))->setSearchable(true),
            (new \ModulesGarden\tssmodule\Core\DataProviders\Column('firstname'))->setSearchable(true),
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