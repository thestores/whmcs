<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Modals;

use ModulesGarden\tssmodule\Components\Alert\AlertInfo;
use ModulesGarden\tssmodule\Components\Modal\ModalBase;
use ModulesGarden\tssmodule\Components\TableSimple\TableSimple;
use ModulesGarden\tssmodule\Components\TabsWidget\TabsWidget;
use ModulesGarden\tssmodule\Components\Widget\Widget;
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

        $productPricingTab = new \ModulesGarden\tssmodule\Components\Tab\Tab();
        $productPricingTab->setTitle('Product Pricing Tab');
        $productPricingTab->addElement($alert);
        $productPricingTab->addElement($widget);
        $productPricingTab->addElement($widgetx);
        $productPricingTab->addElement($productPricingTable);

        $alert = new AlertInfo();
        $alert->setText('Hello!');

        $configOptionPricing = new \ModulesGarden\tssmodule\Components\Tab\Tab();
        $configOptionPricing->setTitle('Config Options Pricing');
        $configOptionPricing->addElement($alert);

        $tabs = new TabsWidget();
        $tabs->addTab($productPricingTab);
        $tabs->addTab($configOptionPricing);

        $this->addElement($tabs);

    }
}