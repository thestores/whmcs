<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Graphs\RevenueByProviderGraph;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;


class RevenueByProviderWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('trending-up');
        $this->addElement(new RevenueByProviderGraph());
    }
}
