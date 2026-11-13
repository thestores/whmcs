<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets;

use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Forms\FinanceSettingsForm;
use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Forms\SslSettingsForm;
use ModulesGarden\tssmodule\Components\Widget\Widget;

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