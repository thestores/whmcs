<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index;

use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Widgets\ExpiringCertificatesWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Widgets\InvoicesWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Widgets\OrdersByStatusWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Widgets\ProductIncomeWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Widgets\ResellersWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Widgets\RevenueByProviderWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Widgets\TotalIncomeWidget;
use ModulesGarden\TSSPlugin\Components\Alert\AlertInfo;
use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Components\Grid\Grid;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;

class StatisticsContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        if(!\ModulesGarden\TSSPlugin\App\Libs\GeneralSettings::enabled('hideInfoMessages'))
        {
            $alert = new AlertInfo();
            $alert->setText($this->translate('statisticsInfo'));
            $this->addElement($alert);
        }

        $grid = new Grid();
        $grid->setRows(
            [
                [
                    [new TotalIncomeWidget(), 6],
                    [new ProductIncomeWidget(), 6]
                ],
                [
                    [new ExpiringCertificatesWidget(), 6],
                    [new OrdersByStatusWidget(), 6]
                ],
                [
                    [new RevenueByProviderWidget(), 6],
                    [new ResellersWidget(), 6]
                ],
                [
                    [new InvoicesWidget(), 12]
                ]
            ]
        );

        $this->addElement($grid);
    }
}