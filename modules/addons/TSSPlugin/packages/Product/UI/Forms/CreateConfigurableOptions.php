<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\UI\Forms;

use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Components\Container\ContainerColumn;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\Form\Form;
use ModulesGarden\TSSPlugin\Components\Row\Row;
use ModulesGarden\TSSPlugin\Components\Switcher\Switcher;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Decorator\Decorator;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Packages\Product\Enums\ConfigSettings;
use ModulesGarden\TSSPlugin\Packages\Product\Libs\ConfigurableOptions\AbstractConfigurableOption;
use ModulesGarden\TSSPlugin\Packages\Product\Libs\ConfigurableOptionsGroups\ConfigurableOptionsGroup;
use ModulesGarden\TSSPlugin\Packages\Product\UI\Builders\ConfigurableOptionsBuilder;

class CreateConfigurableOptions extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = \ModulesGarden\TSSPlugin\Packages\Product\UI\Providers\CreateConfigurableOptions::class;

    public function __construct()
    {
        parent::__construct();

        $this->builder = BuilderCreator::simple($this);
    }

    public function loadHtml(): void
    {
        //@todo move this to provider
        $configurableOptions = is_callable(Config::get(ConfigSettings::CONFIG_OPTIONS_LOADER)) ? Config::get(ConfigSettings::CONFIG_OPTIONS_LOADER)(Request::get('id')) : Config::get(ConfigSettings::CONFIG_OPTIONS);

        $row = new Row();

        foreach ($configurableOptions as $configOption)
        {
            $element = $configOption instanceof ConfigurableOptionsGroup ? $this->buildGroup($configOption) : $this->buildSinlge($configOption);

            $containerClass = Config::get(ConfigSettings::CONFIG_OPTIONS_CONTAINER, ContainerColumn::class);
            $container      = new $containerClass();

            $container->addElement($element);

            if ($configOption instanceof ConfigurableOptionsGroup)
            {
                (new Decorator($container))
                    ->childrenSize()
                    ->fitToParent();
            }

            $row->addElement($container);
        }

        $this->addElement($row);
    }

    protected function generateSwitcher(AbstractConfigurableOption $configOption): Switcher
    {
        $switcher = new Switcher();
        $switcher->setName($configOption->getName());
        $switcher->setTitle($configOption->getFullName());
        $switcher->setDefaultValue(true);

        return $switcher;
    }

    protected function buildSinlge(AbstractConfigurableOption $configOption)
    {
        $section = new Container();

        (new ConfigurableOptionsBuilder($this))->addFieldInContainer($section, $this->generateSwitcher($configOption));

        $section->addClass('lu-m-r-2x');
        $section->addClass('lu-m-l-2x');

        return $section;
    }

    protected function buildGroup(ConfigurableOptionsGroup $configOptionGroup)
    {
        $section = new Widget();
        $section->setTitle($this->translate($configOptionGroup->getName()));

        foreach ($configOptionGroup->getOptions() as $configOptionInGroup)
        {
            (new ConfigurableOptionsBuilder($this))->addFieldInContainer($section, $this->generateSwitcher($configOptionInGroup));
        }

        return $section;
    }

}