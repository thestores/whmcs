<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Widgets;

use ModulesGarden\tssmodule\App\UI\Admin\Import\Index\Forms\ImportForm;
use ModulesGarden\tssmodule\Components\Alert\Alert;
use ModulesGarden\tssmodule\Components\Label\LabelDanger;
use ModulesGarden\tssmodule\Components\Link\Link;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Enums\Color;
use ModulesGarden\tssmodule\Core\WHMCS\Models\Currency;

class ImportWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->addElement(new ImportForm());
    }
}