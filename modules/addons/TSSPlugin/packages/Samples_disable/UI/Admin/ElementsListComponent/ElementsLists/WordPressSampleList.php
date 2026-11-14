<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\ElementsLists;

use ModulesGarden\TSSPlugin\Components\Badge\BadgeDanger;
use ModulesGarden\TSSPlugin\Components\Badge\BadgeInfo;
use ModulesGarden\TSSPlugin\Components\Badge\BadgeSuccess;
use ModulesGarden\TSSPlugin\Components\Badge\BadgeWarning;
use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Components\ElementsList\ElementsList as ElementsListComponent;
use ModulesGarden\TSSPlugin\Components\Image\Image;
use ModulesGarden\TSSPlugin\Components\ListInfo\ListInfo;
use ModulesGarden\TSSPlugin\Components\ListInfo\ListInfoItem;
use ModulesGarden\TSSPlugin\Components\PageViewWidget\PageViewWidget;
use ModulesGarden\TSSPlugin\Components\Row\Row;
use ModulesGarden\TSSPlugin\Components\TableSimple\Record\Record;
use ModulesGarden\TSSPlugin\Components\TableSimple\TableSimple;
use ModulesGarden\TSSPlugin\Components\Text\Text;
use ModulesGarden\TSSPlugin\Components\Text\TextBold;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\DataProviders\QueryDataProvider;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Client;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\Labels\Status;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDelete;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDomain;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonEdit;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonSettings;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonTime;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\Components\WordPressPageViewWidget;

class WordPressSampleList extends ElementsListComponent implements AdminAreaInterface, AjaxComponentInterface
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
            "../modules/addons/TSSPlugin/resources/assets//img/logo.png",
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