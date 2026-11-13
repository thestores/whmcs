<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\AdaptiveTwoColumnsContainer;

use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\BasicElements\LabelsBadgesButtons\Labels;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\CronTasks\CronTasks;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ComplexElements\Overview\Overview;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\Tabs\TabsWidget;

class Container extends \ModulesGarden\tssmodule\Components\AdaptiveTwoColumnsContainer\AdaptiveTwoColumnsContainer implements AdminAreaInterface
{
    public function loadHtml(): void
    {
        $this->addElement(new Labels());
        $this->addElement(new TabsWidget());
        $this->addElement(new CronTasks());
        $this->addElement(new Overview());
    }
}