<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\ServiceInformation;

use ModulesGarden\tssmodule\Components\BoldTextWrapper\BoldTextWrapper;
use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\CopyPasswordInline\CopyPasswordInline;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\Image\Image;
use ModulesGarden\tssmodule\Components\ImageText\ImageText;
use ModulesGarden\tssmodule\Components\Label\Label;
use ModulesGarden\tssmodule\Components\Label\LabelPrimary;
use ModulesGarden\tssmodule\Components\TableSimple\Column\Column;
use ModulesGarden\tssmodule\Components\TableSimple\Record\Record;
use ModulesGarden\tssmodule\Components\TableSimple\TableSimple;
use ModulesGarden\tssmodule\Components\Text\Text;
use ModulesGarden\tssmodule\Components\Text\TextBold;
use ModulesGarden\tssmodule\Components\VisibilityWrapper\VisibilityWrapper;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;

class ServiceInformation extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $table = new TableSimple();

        $table->addColumn(new Column('resource'));
        $table->addColumn(new Column('comparisonType'));
        $table->addColumn(new Column('threshold'));
        $table->addColumn(new Column('actions'));

        $table->addRecord(new Record([
            (new ImageText((new Image())->setUrl("https://picsum.photos/200/300")))->setText("Some Label"),
            "coś",
        ]));
        $table->addRecord(new Record([
            (new ImageText((new Image())->setUrl("/modules/addons/tssmodule/resources/assets//img/logo.png")))->setText("Modules Garden"),
            'myestdomain.com',
            (new VisibilityWrapper(new FormInputText()))->disableWhen('resource', "XXX")
        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText('Memory'),
            '2GB',

        ]));
        $table->addRecord(new Record([
            (new TextBold())->setText('Backups'),
            'Enabled',
        ]));

        $table->addRecord(new Record([
            (new TextBold())->setText('Backups'),
            (new CopyPasswordInline())->setText('MagicPassword'),
        ]));

        $widget = new Widget();
        $widget->addElement($table);
        $widget->setTitle('Service Information');

        $this->addElement($widget);
    }
}