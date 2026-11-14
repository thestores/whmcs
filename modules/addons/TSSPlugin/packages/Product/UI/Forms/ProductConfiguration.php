<?php

namespace ModulesGarden\TSSPlugin\Packages\Product\UI\Forms;

use ModulesGarden\TSSPlugin\App\Http\Actions\MetaData;
use ModulesGarden\TSSPlugin\Components\Button\ButtonSuccess;
use ModulesGarden\TSSPlugin\Components\Container\ContainerContentCentered;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\Row\Row;
use ModulesGarden\TSSPlugin\Components\TableSimple\Record\Record;
use ModulesGarden\TSSPlugin\Components\TableSimple\TableSimple;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalLoad;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Exceptions\UserException;
use ModulesGarden\TSSPlugin\Core\ModuleConstants;
use ModulesGarden\TSSPlugin\Core\Support\Arr;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;
use ModulesGarden\TSSPlugin\Core\Translation\TranslatorTrait;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\ServersGroups;
use ModulesGarden\TSSPlugin\Packages\Product\Enums\ConfigSettings;
use ModulesGarden\TSSPlugin\Packages\Product\Helpers\ProductConfiguration as ProductConfigurationHelper;
use ModulesGarden\TSSPlugin\Packages\Product\Libs\ConfigurableOptionsGroups\ConfigurableOptionsGroup;
use ModulesGarden\TSSPlugin\Packages\Product\UI\Formatters\ConfigOptionFullNameFormatter;
use ModulesGarden\TSSPlugin\Packages\Product\UI\Modals\CreateConfigurableOptions;

class ProductConfiguration extends \ModulesGarden\TSSPlugin\Components\Form\AbstractForm implements AdminAreaInterface
{
    use TranslatorTrait;

    protected string $provider = \ModulesGarden\TSSPlugin\Packages\Product\UI\Providers\ProductConfiguration::class;

    public function preLoadHtml(): void
    {
        $this->checkServerRequirements();

        $this->builder = BuilderCreator::twoColumns($this);
        $this->setContainerTag('div');

        parent::preLoadHtml();
    }


    private function checkServerRequirements(): void
    {
        if (!Arr::get((new MetaData())->execute(), 'RequiresServer', false))
        {
            return;
        }

        $serverGroupId = Request::get('servergroup', false);

        if (!$serverGroupId)
        {
            throw new UserException($this->translate('productRequiresServer', [], ['packages.product.errors']));
        }

        $moduleName = ModuleConstants::getModuleName();

        if (ServersGroups::find($serverGroupId)->servers->where('type', $moduleName)->count() <= 0)
        {
            throw new UserException($this->translate('invalidServerType', ['moduleName' => $moduleName], ['packages.product.errors']));
        }
    }

    public function postLoadHtml(): void
    {
        parent::postLoadHtml();

        if (ProductConfigurationHelper::isRunAsProductAddon())
        {
            return;
        }

        $widget = new Widget();
        $widget->setTitle($this->translate('title', [], ['packages.product.productConfiguration.form']));

        $table = new TableSimple();

        $configurableOptions = is_callable(Config::get(ConfigSettings::CONFIG_OPTIONS_LOADER)) ? Config::get(ConfigSettings::CONFIG_OPTIONS_LOADER)(Request::get('id')) : Config::get(ConfigSettings::CONFIG_OPTIONS);

        foreach ($configurableOptions as $configOption)
        {
            if ($configOption instanceof ConfigurableOptionsGroup)
            {
                foreach ($configOption->getOptions() as $option)
                {
                    $table->addRecord(new Record([ConfigOptionFullNameFormatter::buildFullNameContainer($option->getFullName())]));
                }
                continue;
            }

            $table->addRecord(new Record([ConfigOptionFullNameFormatter::buildFullNameContainer($configOption->getFullName())]));
        }

        $widget->addElement($table);

        $button = new ButtonSuccess();
        $button->setTitle($this->translate('button_submit', [], ['packages.product.productConfiguration.form']));
        $button->onClick(new ModalLoad(new CreateConfigurableOptions()));

        $container = new ContainerContentCentered();
        $container->addElement($button);
        $widget->addElement($container);

        $this->addElement((new Row)->addElement($widget));
    }
}