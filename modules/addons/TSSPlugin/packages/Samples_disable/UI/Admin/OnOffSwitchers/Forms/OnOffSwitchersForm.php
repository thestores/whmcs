<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\OnOffSwitchers\Forms;

use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Components\Form\Builder\BuilderCreator;
use ModulesGarden\TSSPlugin\Components\Switcher\Switcher;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\OnOffSwitchers\Providers\OnOffSwitchersProviders;

class OnOffSwitchersForm extends AbstractForm implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $provider = OnOffSwitchersProviders::class;
    protected string $providerAction = OnOffSwitchersProviders::ACTION_UPDATE;

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
        $this->builder->createField(Switcher::class, 'switcherOnOff', true)
            ->setDefaultValue(Switcher::STATE_ON)
            ->setOnOffMode();
    }
}