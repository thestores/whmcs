<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists;

use ModulesGarden\tssmodule\Components\Badge\BadgeDanger;
use ModulesGarden\tssmodule\Components\Badge\BadgeInfo;
use ModulesGarden\tssmodule\Components\Badge\BadgeSuccess;
use ModulesGarden\tssmodule\Components\Badge\BadgeWarning;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\ElementsList\ElementsList as ElementsListComponent;
use ModulesGarden\tssmodule\Components\Image\Image;
use ModulesGarden\tssmodule\Components\ListInfo\ListInfo;
use ModulesGarden\tssmodule\Components\ListInfo\ListInfoItem;
use ModulesGarden\tssmodule\Components\PageViewWidget\PageViewWidget;
use ModulesGarden\tssmodule\Components\Row\Row;
use ModulesGarden\tssmodule\Components\TableSimple\Record\Record;
use ModulesGarden\tssmodule\Components\TableSimple\TableSimple;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Components\Text\TextBold;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\DataProviders\QueryDataProvider;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Client;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Labels\Status;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDelete;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDomain;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonEdit;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonSettings;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonTime;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\Components\WordPressPageViewWidget;

class WordPressSampleList extends ElementsListComponent implements AdminAreaInterface, AjaxComponentInterface
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
        $pageViewWidget = new PageViewWidget();
        $pageViewWidget->setTitle($record->firstname);

        $pageViewWidget->setImage($this->getImage($record));
        $pageViewWidget->setDetails($this->getDetails($record));
        $pageViewWidget->setButtonsContainer($this->getButtonsContainer($record));

        return $pageViewWidget;
    }

    protected function getImage($record): Image
    {
        $images = [
            "../modules/addons/tssmodule/resources/assets//img/logo.png",
            "templates/blend/images/logo.png",
        ];

        return (new Image())->setUrl($images[rand(0,1)]);
    }

    protected function getDetails($record): AbstractComponent
    {
        $table = new TableSimple();
        $table->addRecord(new Record([
            (new TextBold())->setText('Status'),
            "Terminated",
        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText("Hostname"),
            'myestdomain.com',
        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText('Memory'),
            '2GB',
        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText('Backups'),
            'Enabled',
        ]));

        return $table;
    }

    protected function getButtonsContainer($record): AbstractComponent
    {
        $container = new Container();

        $bar = new Toolbar();
        $bar->addElement((new ButtonDelete()));
        $bar->addElement((new ButtonDomain()));
        $bar->addElement((new ButtonEdit()));
        $bar->addElement((new ButtonSettings()));
        $bar->addElement((new ButtonTime()));

        $container->addElement($bar);
        $container->addElement(new Row());

        return $container;
    }
}