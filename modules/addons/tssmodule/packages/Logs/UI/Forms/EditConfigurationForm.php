<?php

namespace ModulesGarden\tssmodule\Packages\Logs\UI\Forms;

use ModulesGarden\tssmodule\Components\Dropdown\Dropdown;
use ModulesGarden\tssmodule\Components\Form\Form;
use ModulesGarden\tssmodule\Components\FormInputText\FormInputText;
use ModulesGarden\tssmodule\Components\Number\Number;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Packages\Logs\UI\Providers\ConfigurationProvider;
use ModulesGarden\tssmodule\Core\Support\Facades\Config;

class EditConfigurationForm extends Form implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = ConfigurationProvider::class;
    protected string $providerAction = ConfigurationProvider::ACTION_UPDATE;

    public function loadHtml(): void
    {
        $this->builder->addField((new Switcher())->setName('logging'), true);
        $this->builder->addField((new Dropdown())->setName('api_mode'), true);
        $this->builder->addField((new Switcher())->setName('events'), true);
        $this->builder->addField((new FormInputText())->setName('debug_services'), true);
        $this->builder->addField((new Dropdown())->setName('debug_hours'), true);

        $this->builder->addField((new Dropdown())
            ->setMultiple()
            ->setName('types'),
            true
        );

        if (!Config::get('logs.auto_prune.enabled', true))
        {
            return;
        }

        $this->builder->addField((new Switcher())
            ->setName('auto_prune')
            ->onChange(new Reload($this)),
            true
        );

        if (!$this->provider()->getValueById('auto_prune'))
        {
            return;
        }

        $this->builder->addField((new Number())
            ->setName('auto_prune_older_than')
            ->setRange(0, 9999)
            ->setDefaultValue(0),
            true
        );

    }
}
