<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\HintsBox\Forms;

use ModulesGarden\tssmodule\Components\Form\AbstractForm;
use ModulesGarden\tssmodule\Components\Form\Builder\BuilderCreator;
use ModulesGarden\tssmodule\Components\Switcher\Switcher;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\HintsBox\Providers\SettingsProvider;

class SettingsForm extends AbstractForm implements AdminAreaInterface
{
    protected string $provider = SettingsProvider::class;
    protected string $providerAction = SettingsProvider::ACTION_UPDATE;

    public function __construct()
    {
        parent::__construct();

        $widget = new Widget();
        $this->addElement($widget);

        $this->builder = BuilderCreator::twoColumnsInContainer($this, $widget);
        $this->builder->createSubmitButton();
    }

    public function loadHtml(): void
    {
        $this->builder->createField(Switcher::class, 'hideGuide', true);
    }
}