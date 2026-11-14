<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Widgets;

use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Forms\FinanceSettingsForm;
use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Forms\SslSettingsForm;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;

class FinanceSettingsWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
$this->setIcon('cash-multiple');
        $this->setSubtitle($this->translate('subtitle'));
        $this->addElement(new FinanceSettingsForm());
    }
}