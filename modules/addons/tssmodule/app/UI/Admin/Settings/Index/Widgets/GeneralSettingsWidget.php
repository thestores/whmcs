<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Widgets;

use ModulesGarden\tssmodule\App\UI\Admin\Settings\Index\Forms\GeneralSettingsForm;
use ModulesGarden\tssmodule\Components\Widget\Widget;

class GeneralSettingsWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
$this->setIcon('web');
        $this->setSubtitle($this->translate('subtitle'));
        $this->addElement(new GeneralSettingsForm());
    }
}
