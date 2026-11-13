<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Forms;

use ModulesGarden\tssmodule\Components\Alert\AlertInfo;
use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\TableSimple\Record\Record;
use ModulesGarden\tssmodule\Components\TableSimple\TableSimple;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;

class SwitchersForm extends \ModulesGarden\tssmodule\Components\Form\Form
{
    public function loadHtml(): void
    {
        $dropDownOptions = ['option 1', 'option 2', 'option 3'];

        $alert = new AlertInfo();
        $alert->setText('Please use dropdown to reload form.  And note that switcher in widget loosing current state every reload form');

        $this->builder->createField(Dropdown::class, 'reloadDropdown', false)
            ->setDefaultValueAsFirstOption()->setOptions($dropDownOptions)->onChange(new Reload($this));

        $checkBoxField = new Switcher();
        $checkBoxField->setId('freeSwitcher');
        $checkBoxField->setName('freeSwitcher');

        $this->builder->addField($checkBoxField);

        $table = new TableSimple();
        $table->setId('someWeirdId');
        $table->setTextCentered();

        $table->addRecord(new Record([
            '',
            "<strong>Name</strong>",
            "<strong>Price</strong>",
        ]));


        $switcherField = new Switcher();
        $switcherField->setId("widgetSwitcher");
        $switcherField->setName("widgetSwitcher");

        $table->addRecord(new Record([
            $switcherField,
            "name",
            "100 zł"
        ]));

        $widget = new Widget();
        $widget->addElement($table);
        $widget->setTitle("Some Widget");
        $this->addElement($alert);
        $this->addElement($widget);
    }
}