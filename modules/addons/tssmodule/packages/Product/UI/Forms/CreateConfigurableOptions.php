<?php

namespace ModulesGarden\tssmodule\Packages\Product\UI\Forms;

use ModulesGarden\tssmodule\Components\Container\Container;
use ModulesGarden\tssmodule\Components\Container\ContainerColumn;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\Row\Row;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Decorator\Decorator;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;
use ModulesGarden\tssmodule\Packages\Product\Enums\ConfigSettings;
use ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptions\AbstractConfigurableOption;
use ModulesGarden\tssmodule\Packages\Product\Libs\ConfigurableOptionsGroups\ConfigurableOptionsGroup;
use ModulesGarden\tssmodule\Packages\Product\UI\Builders\ConfigurableOptionsBuilder;

class CreateConfigurableOptions extends Form implements AdminAreaInterface, AjaxComponentInterface
{
    protected string $provider = \ModulesGarden\tssmodule\Packages\Product\UI\Providers\CreateConfigurableOptions::class;

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