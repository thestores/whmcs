<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Forms;

use ModulesGarden\tssmodule\Components\Container\ContainerQuarterPage;
use ModulesGarden\tssmodule\Components\Container\ContainerRow;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Actions\CopyValueByClass;

class Form extends \ModulesGarden\tssmodule\Components\Form\Form
{
    public function loadHtml(): void
    {
        $main = new ContainerRow();
        $this->addElement($main);

        for ($i = 0; $i < 4; $i++)
        {
            $container = new ContainerQuarterPage();
            $main->addElement($container);

            $widget = new Widget();
            $widget->setTitle('Widget ' . +$i);
            $widget->addToToolbar((new Switcher())->onChange(new CopyValueByClass("widget$i")));
            $container->addElement($widget);

            for ($j = 0; $j < 4; $j++)
            {
                $switcher = new Switcher();
                $switcher->setName("name$i$j");
                $switcher->setCss("widget$i");

                $this->builder->addFieldInContainer($widget, $switcher);
            }
        }
    }
}