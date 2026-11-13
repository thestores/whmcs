<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\TreeView\DataTable;

use ModulesGarden\tssmodule\Components\DataTable\Column;
use ModulesGarden\tssmodule\Components\IconButton\IconButtonEdit;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalLoad;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\tssmodule\Core\DataProviders\QueryDataProvider;
use ModulesGarden\tssmodule\Core\Http\Request;
use WHMCS\User\Client;

class QueryDataTable extends \ModulesGarden\tssmodule\Components\DataTable\DataTable implements AdminAreaInterface, AjaxComponentInterface, AjaxOnLoadInterface
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('datatable');
    }

    public function loadHtml(): void
    {
        $this->setTitle('Clients');

        $this
            ->addColumn((new Column('id'))
                ->setSortable()
                ->setSearchable(true, Column::TYPE_INT))
            ->addColumn((new Column('firstname'))
                ->setSortable(true)
                ->setSearchable(true))
            ->addColumn((new Column('lastname'))
                ->setSortable(true)
                ->setSearchable(true))
            ->addColumn((new Column('taxexempt')));

        $this->setAjaxData([]);
        $button = new IconButtonEdit();
        $button->onClick((new ModalLoad(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Modals\UserEdit()))->withParams([
            'xxx' => \ModulesGarden\tssmodule\Core\Support\Facades\Request::get('ajaxData')['dupa'] ?? null
        ]));
        $this->addActionButton($button);

//        $redirect = new IconButton();
//        $redirect->setIcon('account');
//        $redirect->onClick((new RedirectFromParam('url', [
//            // 'redirectedId' => 'id'
//        ])));
//
//
//        $this->addActionButton($redirect);
//$this->addActionButton(new UserEdit());
//        $this->addActionButton(new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Buttons\UserDelete());
//        $this->addMassActionButton((new \ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Buttons\UserDelete())->displayWithTitle("Delete"));
//
//
//        $this->addActionButton(new  UserEdit());
//        $this->addActionButton(new  UserDelete());
//        $this->addToToolbar(new UserCreate());

        //Burger
//        $add = new DropdownMenuItem();
//        $add->setIcon('edit');
//
//        $dropdown = new DropdownMenu();
//        $dropdown->addItem($add);
//
//        $this->addToToolbar($dropdown);
    }

    public function loadData(): void
    {
        $clients = Client::select('tblclients.id', 'tblclients.firstname', 'lastname', 'taxexempt', 'companyname');

        $dataProv = new QueryDataProvider($clients);
        $dataProv->setColumns([
            new \ModulesGarden\tssmodule\Core\DataProviders\Column('tblclients.id'),
            new \ModulesGarden\tssmodule\Core\DataProviders\Column('tblclients.firstname'),
        ]);
        $dataProv->setDefaultSorting('tblclients.id', 'DESC');
        $this->setDataProvider($dataProv);
        $this->setAjaxData(['rand' . rand(0, 100) => 1]);
    }
}
