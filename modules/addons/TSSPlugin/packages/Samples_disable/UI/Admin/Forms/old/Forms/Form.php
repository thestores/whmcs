<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\Forms;

use ModulesGarden\TSSPlugin\Components\Container\ContainerQuarterPage;
use ModulesGarden\TSSPlugin\Components\Container\ContainerRow;
use ModulesGarden\TSSPlugin\Components\Switcher\Switcher;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Actions\CopyValueByClass;

class Form extends \ModulesGarden\TSSPlugin\Components\Form\Form
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