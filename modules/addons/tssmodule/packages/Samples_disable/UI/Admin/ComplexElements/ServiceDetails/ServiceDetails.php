<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\ServiceDetails;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\Grid\Grid;
use ModulesGarden\tssmodule\Components\IconButton\IconButtonDelete;
use ModulesGarden\tssmodule\Components\IconButton\IconButtonEdit;
use ModulesGarden\tssmodule\Components\Label\LabelDanger;
use ModulesGarden\tssmodule\Components\Link\Link;
use ModulesGarden\tssmodule\Components\ListInfo\ListInfo;
use ModulesGarden\tssmodule\Components\ListInfo\ListInfoItem;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalLoad;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Modals\UserDelete;

class ServiceDetails extends Container
{
    public function loadHtml(): void
    {
        $listInfo = new ListInfo();
        $listInfo->addItem(new ListInfoItem('Client', 'Test Tester'));
        $listInfo->addItem((new ListInfoItem('Product', (new Link())->setTitle('#4 - VPS #4')->setUrl('https://google.com')))->setElements([
            (new IconButtonDelete())->onClick((new ModalLoad(new UserDelete()))
                ->withParams([
                    'someParams' => 666
                ])),
            (new IconButtonEdit())->onClick(new ModalLoad(new UserDelete())),
        ]));
        $listInfo->addItem(new ListInfoItem('Total Income', '$63.97 USD'));
        $listInfo->addItem(new ListInfoItem('Credentials', '#1 Amazon AWS'));
        $listInfo->addItem(new ListInfoItem('Pricing Group', '#1 EC2-AWS'));
        $listInfo->addItem(new ListInfoItem('Billing Method', 'On the first day of month'));
        $listInfo->addItem(new ListInfoItem('Billing Type', 'Custom Details'));
        $listInfo->addItem(new ListInfoItem('Label', (new LabelDanger())->displayAsStatusLabel()->setText('Danger')));

        $widget = new Widget();
        $widget->setTitle('Service Details');
        $widget->addElement($listInfo);

        $grid = new Grid();
        $grid->setRows([
            [[$widget, 6]]
        ]);
        $this->addElement($grid);
    }
}