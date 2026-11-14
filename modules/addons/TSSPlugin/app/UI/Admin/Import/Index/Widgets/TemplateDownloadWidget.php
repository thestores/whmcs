<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Import\Index\Widgets;

use ModulesGarden\TSSPlugin\App\UI\Admin\Import\Index\Forms\ImportForm;
use ModulesGarden\TSSPlugin\App\UI\Admin\Import\Index\Forms\TemplateDownloadForm;
use ModulesGarden\TSSPlugin\Components\Alert\Alert;
use ModulesGarden\TSSPlugin\Components\Label\LabelDanger;
use ModulesGarden\TSSPlugin\Components\Link\Link;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Enums\Color;
use ModulesGarden\TSSPlugin\Core\WHMCS\Models\Currency;

class TemplateDownloadWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setCss('tss-dl');
        $this->addElement(new TemplateDownloadForm());
    }
}