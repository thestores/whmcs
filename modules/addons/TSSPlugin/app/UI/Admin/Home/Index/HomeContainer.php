<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index;

use ModulesGarden\TSSPlugin\App\Libs\AutomatedSsl;
use ModulesGarden\TSSPlugin\App\Libs\Edition;
use ModulesGarden\TSSPlugin\App\Libs\Helpers;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Shared\Card;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Shared\SalesSummary;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\AnnouncementsWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\AttentionWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\AutomatedSslBanner;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\GatewayWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\MigrationWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\NextStepsWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\OverviewWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\PipelineWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\SupportWidget;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets\SystemCheckWidget;
use ModulesGarden\TSSPlugin\Components\Container\Container;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Config;

/**
 * Module dashboard: heading, setup strip (first 72 hours), KPI tiles, then rows of a wide and a narrow panel:
 * pipeline + system health, needs attention + gateway, sales and margin + migration, announcements + help.
 * Styles in resources/assets/css/dashboard.css and theme.css, scoped to .tss-dash.
 */
class HomeContainer extends Container implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->setCss('tss-dash');

        $this->addElement(Card::html($this->headHtml()));
        // setup guide until all three steps are done
        if(NextStepsWidget::visible())
        {
            $this->addElement(new NextStepsWidget());
        }
        $this->addElement(Card::html($this->kpisHtml()));

        // the Automated SSL banner until a CaaS and an AIS product are enabled, then the certificate pipeline
        $this->addElement($this->row(AutomatedSsl::enabled() ? new PipelineWidget() : new AutomatedSslBanner(), new SystemCheckWidget()));
        $this->addElement($this->row(new AttentionWidget(), new GatewayWidget()));
        $this->addElement($this->row(new OverviewWidget(), MigrationWidget::relevant() ? new MigrationWidget() : null));
        $this->addElement($this->row(new AnnouncementsWidget(), new SupportWidget()));

        $this->addElement(Card::html($this->footHtml()));
    }

    /** A wide panel and, when given, a narrow one beside it */
    protected function row(Container $wide, Container $narrow = null): Container
    {
        $row = new Container();
        $row->setCss('tss-dash__row' . ($narrow ? '' : ' is-single'));
        $row->addElement($wide);
        if($narrow)
        {
            $row->addElement($narrow);
        }

        return $row;
    }

    protected function headHtml(): string
    {
        return '<div class="tss-dash__head"><div>'
            . '<div class="tss-dash__crumb">' . Card::e(Edition::name()) . Card::icon('chevron-right') . Card::e($this->translate('title')) . '</div>'
            . '<h2>' . Card::e($this->translate('title')) . '</h2></div>'
            . '<span class="tss-dash__period">' . Card::icon('calendar-month-outline') . Card::e($this->translate('period')) . '</span>'
            . '</div>';
    }

    protected function kpisHtml(): string
    {
        $sales    = SalesSummary::get();
        $currency = (string)Helpers::getDefaultCurrencyCode();
        $tiles    = [
            ['kpi_sales', Helpers::formatDefaultCurrency($sales['paid']), 'currency-usd', 'ok', 'credit-card-outline'],
            ['kpi_profit', Helpers::formatDefaultCurrency($sales['profit']), 'trending-up', 'info', 'chart-line'],
            ['kpi_issued', (string)$sales['issued'], 'certificate-outline', 'ok', 'calendar-month-outline'],
            ['kpi_expiring', (string)$sales['expiring'], 'timer-sand', 'warn', 'check-circle-outline'],
        ];

        $html = '<section class="tss-dash__kpis" aria-label="' . Card::e($this->translate('period')) . '">';
        foreach($tiles as [$key, $value, $icon, $tone, $detailIcon])
        {
            $html .= '<article class="tss-kpi"><div class="tss-kpi__top"><h3>' . Card::e($this->translate($key)) . '</h3>' . Card::tile($icon, $tone) . '</div>'
                . '<p class="tss-kpi__value">' . Card::e($value) . '</p>'
                . '<p class="tss-kpi__detail">' . Card::icon($detailIcon) . Card::e($this->translate($key . '_detail', ['currency' => $currency])) . '</p></article>';
        }

        return $html . '</section>';
    }

    protected function footHtml(): string
    {
        $version = (string)Config::get('configuration.version', '');

        return '<div class="tss-dash__foot"><span>' . Card::icon('shield-check-outline') . Card::e(Edition::name()) . '</span>'
            . ($version !== '' ? '<span>' . Card::e($this->translate('version', ['version' => $version])) . '</span>' : '')
            . '</div>';
    }
}
