<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Widgets;

use ModulesGarden\TSSPlugin\App\UI\Admin\Settings\Index\Forms\ApiSettingsForm;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;

class ApiSettingsWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
$this->setIcon('key-outline');
        $this->setSubtitle($this->translate('subtitle'));
        $this->addElement(new ApiSettingsForm());
    }
}