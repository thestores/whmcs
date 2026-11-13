<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Widgets;

use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Shared\Card;
use ModulesGarden\tssmodule\App\UI\Admin\Home\Index\Shared\SalesSummary;

/**
 * Sales and margin of the last month: invoiced amount, reseller cost, gross profit and margin on cost, with the
 * paid / unpaid / overdue split and a hint when the margin is low
 */
class OverviewWidget extends Card
{
    /** below this margin on cost (%) the panel suggests raising prices */
    const LOW_MARGIN = 10;

    public function loadHtml(): void
    {
        $this->start('chart-line', $this->translate('title'),
            '<a class="tss-dcard__aside" href="addonmodules.php?module=tssmodule&amp;mg-page=statistics">' . Card::e($this->translate('statistics')) . '</a>', 'info');

        $sales    = SalesSummary::get();
        $invoiced = $sales['paid'] + $sales['unpaid'] + $sales['overdue'];
        // cost and margin over the invoiced rows whose reseller cost is known (an unknown cost is not a cost of 100%)
        $cost     = $sales['cost'];
        $profit   = $sales['costedSales'] - $cost;
        $margin   = $cost > 0 ? $profit / $cost * 100 : 0;

        $tiles = '';
        foreach([
            ['currency-usd', 'invoiced', Helpers::formatDefaultCurrency($invoiced)],
            ['package-variant-closed', 'cost', Helpers::formatDefaultCurrency($cost)],
            ['trending-up', 'profit', Helpers::formatDefaultCurrency($profit)],
            ['tag-outline', 'margin', number_format($margin, 1) . '%'],
        ] as [$icon, $key, $value])
        {
            $tiles .= '<div><span>' . Card::icon($icon) . Card::e($this->translate($key)) . '</span><b>' . Card::e($value) . '</b></div>';
        }

        $note = $this->translate('split', [
            'paid'    => Helpers::formatDefaultCurrency($sales['paid']),
            'unpaid'  => Helpers::formatDefaultCurrency($sales['unpaid']),
            'overdue' => Helpers::formatDefaultCurrency($sales['overdue']),
        ]);
        if($cost > 0 && $margin < self::LOW_MARGIN)
        {
            $note .= ' ' . $this->translate('low', ['margin' => self::LOW_MARGIN]);
        }

        $this->addElement(Card::html('<div class="tss-money">' . $tiles . '</div>'
            . '<div class="tss-money__bar"><i style="width:' . max(0, min(100, round($margin, 1))) . '%"></i></div>'
            . '<p class="tss-money__note">' . Card::e($note) . '</p>'));

        $this->foot('addonmodules.php?module=tssmodule&mg-page=pricing', 'tag-outline', $this->translate('pricing'));
    }
}
