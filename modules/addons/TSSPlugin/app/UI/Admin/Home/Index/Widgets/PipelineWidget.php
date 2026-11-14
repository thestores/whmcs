<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Widgets;

use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Shared\Card;
use ModulesGarden\TSSPlugin\App\UI\Admin\Home\Index\Shared\Pipeline;

/**
 * Certificate pipeline: how many of this module's orders wait for the client, are with the certificate authority,
 * are issued or expire soon (the one dark panel of the dashboard)
 */
class PipelineWidget extends Card
{
    const STAGES = [
        'configure'  => ['file-document-outline', 'is-y'],
        'validation' => ['send-outline', 'is-b'],
        'issued'     => ['shield-check-outline', 'is-g'],
        'expiring'   => ['timer-sand', 'is-r'],
    ];

    public function loadHtml(): void
    {
        $reports = 'addonmodules.php?module=TSSPlugin&mg-page=reports';
        $this->start('lock-outline', $this->translate('title'), '<a class="tss-dcard__aside" href="' . Card::e($reports) . '">' . Card::e($this->translate('open')) . '</a>', 'dark', 'tss-pipe');

        $data = Pipeline::get();

        // the bar: the three stages an order goes through (expiring ones are part of "issued")
        $bar = '';
        foreach(['configure', 'validation', 'issued'] as $stage)
        {
            if($data[$stage] > 0)
            {
                $bar .= '<span class="' . self::STAGES[$stage][1] . '" style="flex:' . (int)$data[$stage] . '"></span>';
            }
        }

        $stages = '';
        foreach(self::STAGES as $stage => [$icon, $tone])
        {
            $stages .= '<div class="tss-stage"><div class="tss-stage__top"><span class="' . $tone . '">' . Card::icon($icon) . '</span>' . Card::e($this->translate($stage)) . '</div>'
                . '<b>' . (int)$data[$stage] . '</b><small>' . Card::e($this->translate($stage . '_detail')) . '</small></div>';
        }

        $this->body('<div class="tss-pipe__bar' . ($bar === '' ? ' is-empty' : '') . '" aria-hidden="true">' . $bar . '</div><div class="tss-pipe__stages">' . $stages . '</div>');

        $this->addElement(Card::html('<div class="tss-pipe__more">'
            . '<a href="orders.php?status=Pending">' . Card::icon('credit-card-clock-outline') . '<span>' . Card::e($this->translate('unpaid', ['n' => $data['unpaid']])) . '<small>' . Card::e($this->translate('unpaid_detail')) . '</small></span></a>'
            . '<a href="' . Card::e($reports) . '">' . Card::icon('calendar-remove-outline') . '<span>' . Card::e($this->translate('expired', ['n' => $data['expired']])) . '<small>' . Card::e($this->translate('expired_detail')) . '</small></span></a>'
            . '<a href="' . Card::e($reports) . '">' . Card::icon('calendar-month-outline') . '<span>' . Card::e($this->translate('renewals')) . '<small>' . Card::e($this->translate('renewals_detail')) . '</small></span></a>'
            . '</div>'));
    }
}
