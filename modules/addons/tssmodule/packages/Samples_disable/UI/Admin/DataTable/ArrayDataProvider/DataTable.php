<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\ArrayDataProvider;

use ModulesGarden\tssmodule\Components\CopyPasswordInline\CopyPasswordInline;
use ModulesGarden\tssmodule\Components\DataTable\Column;
use ModulesGarden\tssmodule\Components\FormLabel\FormLabel;
use ModulesGarden\tssmodule\Components\Label\LabelSuccess;
use ModulesGarden\tssmodule\Components\ListSimple\ListSimple;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\DataProviders\ArrayDataProvider;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Switchers\TaxExempt;
use WHMCS\User\Client;

class DataTable extends \ModulesGarden\tssmodule\Components\DataTable\DataTable implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setTitle('Client Array Data Provider');

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

//        $this->addMassActionButton(new UserEdit());
//        $this->addMassActionButton(new UserDelete());
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
        $clients = Client::select('id', 'firstname', 'lastname', 'taxexempt', 'companyname')->get()->toArray();

        $dataProv = new ArrayDataProvider($clients);
        $dataProv->setDefaultSorting('id', 'DESC');
        $this->setDataProvider($dataProv);
    }


    protected function parseDataSetRecords(): void
    {
        $this->dataSet->setFieldModifier('taxexempt', function($fieldName, $row, $fieldValue) {
            $label = new FormLabel();
            $label->addElement((new TaxExempt('XXX'))->setValue($fieldValue));

            return $label;
        });


        $this->dataSet->setFieldModifier('lastname', function($fieldName, $row, $fieldValue) {
            return (new CopyPasswordInline())->setText($fieldValue);
        });

        $this->dataSet->setFieldModifier('firstname', function($fieldName, $row, $fieldValue) {
            $container = new ListSimple();
            $container->addItem((new LabelSuccess())->setText($fieldValue)->displayAsStatusLabel());
            $container->addItem((new LabelSuccess())->setText($row['companyname'])->displayAsStatusLabel());
            return $container;
        });


        $this->dataSet->modifyRecords();
    }
}
