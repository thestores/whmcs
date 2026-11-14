<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\Modals;

use ModulesGarden\TSSPlugin\Components\Alert\AlertInfo;
use ModulesGarden\TSSPlugin\Components\Modal\ModalBase;
use ModulesGarden\TSSPlugin\Components\TableSimple\TableSimple;
use ModulesGarden\TSSPlugin\Components\TabsWidget\TabsWidget;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use WHMCS\Database\Capsule as DB;

class Base extends ModalBase
{
    public function loadHtml(): void
    {
        $productPricingTable = new TableSimple();
        $productPricingTable->setRecords(DB::table('tblclients')->select('firstname', 'lastname')->limit(20)->get()->toArray());

        $alert = new AlertInfo();
        $alert->setText('Hello!');

        $widget = new Widget();
        $widget->setTitle('XXX');
        $widget->setContent('esfefsef');

        $widgetx = new Widget();
        $widgetx->addElement($productPricingTable);

        $productPricingTab = new \ModulesGarden\TSSPlugin\Components\Tab\Tab();
        $productPricingTab->setTitle('Product Pricing Tab');
        $productPricingTab->addElement($alert);
        $productPricingTab->addElement($widget);
        $productPricingTab->addElement($widgetx);
        $productPricingTab->addElement($productPricingTable);

        $alert = new AlertInfo();
        $alert->setText('Hello!');

        $configOptionPricing = new \ModulesGarden\TSSPlugin\Components\Tab\Tab();
        $configOptionPricing->setTitle('Config Options Pricing');
        $configOptionPricing->addElement($alert);

        $tabs = new TabsWidget();
        $tabs->addTab($productPricingTab);
        $tabs->addTab($configOptionPricing);

        $this->addElement($tabs);

    }
}