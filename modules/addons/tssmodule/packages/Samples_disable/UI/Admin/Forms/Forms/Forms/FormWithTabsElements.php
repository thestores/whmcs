<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\Forms\Forms\Forms;

use ModulesGarden\tssmodule\Components\Alert\AlertDanger;
use ModulesGarden\tssmodule\Components\Container\ContainerQuarterPage;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\FormGroup\FormGroup;
use ModulesGarden\tssmodule\Components\FormLabel\FormLabel;
use ModulesGarden\tssmodule\Components\PreBlock\PreBlock;
use ModulesGarden\tssmodule\Components\Row\Row;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\Tab\Tab;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Components\Widget\WidgetGrey;
use ModulesGarden\tssmodule\Core\Components\Actions\PopulateValue;
use ModulesGarden\tssmodule\Core\Components\Decorator\Decorator;

class FormWithTabsElements extends AbstractFormElements
{
    public function loadHtml(): void
    {
        //Create tabs container
        $tabsContainer = new \ModulesGarden\tssmodule\Components\TabsWidget\TabsWidget();
//        $tabsContainer->setTitle('Container');
        $this->addElement($tabsContainer);

        //Add additional widget in main container. We need to do that before running loadHtml from parent, because parent adds buttons. Usually you don't need to do that, just do not use the same BaseForm class ;)
        $this->addGreyWidgets();

        //Create Tab
        $tabFirst = new Tab();
        $tabFirst->setTitle($this->translate('first_tab'));
        $tabsContainer->addTab($tabFirst);

        //Create Tab
        $tabSecond = new Tab();
        $tabSecond->setTitle($this->translate('second_tab'));
        $tabsContainer->addTab($tabSecond);

        $widget = new Widget();
        $widget->setTitle('Test Widget In Tab');
        $tabSecond->addElement($widget);

//        $widget = new Widget();
//        $widget->setTitle('Test Widget In Tab 2');
//        $tabSecond->addElement($widget);

        //Create Tab
        $tabThird = new Tab();
        $tabThird->setTitle($this->translate('third_tab'));
        $tabsContainer->addTab($tabThird);


        $tabThird->addElement((new Widget())->setTitle('XXXXXX'));

        $field = new FormGroup();
        $label = new FormLabel();
        $label->setCss('lu-form-label');
        $label->setText('sfsefsefsfsef');

        $field->addElement($label);
        $field->addElement((new PreBlock())->setContent('asadawd'));
        $tabFirst->addElement($field);
        $tabFirst->addElement((new AlertDanger())->setText('some text'));
        //Define builder that will be used to create fields by parent
        $this->builder = BuilderCreator::oneColumnInContainer($this, $tabFirst);

        parent::loadHtml();
    }

    protected function addGreyWidgets()
    {
        $row    = new Row();
        $titles = [
            'Email',
            'One Click Login',
            'Domains',
            'Others'
        ];
        for ($i = 0; $i < 4; $i++)
        {
            $widget = new WidgetGrey();
            $widget->setTitle($titles[$i]);
            $populateValueTo = new PopulateValue();

            for ($j = 0; $j < rand(4, 8); $j++)
            {
                $switcher = new Switcher();
                $switcher->setName('test' . $i . $j);
                $populateValueTo->addName('test' . $i . $j);

                BuilderCreator::simpleNoDefaultWidth($this)->addFieldInContainer($widget, $switcher);
            }

            $widget->addToToolbar((new Switcher())->onChange($populateValueTo));
            $quarter = new ContainerQuarterPage();
            $quarter->addElement($widget);
            (new Decorator($quarter))
                ->childrenSize()
                ->fitToParent();

            $row->addElement($quarter);
        }

        $mainWidget = new Widget();
        $mainWidget->setTitle('Features');
        $mainWidget->addElement($row);

        $this->addElement($mainWidget);
    }
}
