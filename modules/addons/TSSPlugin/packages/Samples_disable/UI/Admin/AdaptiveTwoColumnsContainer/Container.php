<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\AdaptiveTwoColumnsContainer;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons\Labels;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\CronTasks\CronTasks;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ComplexElements\Overview\Overview;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\Tabs\TabsWidget;

class Container extends \ModulesGarden\TSSPlugin\Components\AdaptiveTwoColumnsContainer\AdaptiveTwoColumnsContainer implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Labels());
        $this->addElement(new TabsWidget());
        $this->addElement(new CronTasks());
        $this->addElement(new Overview());
    }
}