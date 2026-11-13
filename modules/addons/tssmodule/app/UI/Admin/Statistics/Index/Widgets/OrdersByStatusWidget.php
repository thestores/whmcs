<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Statistics\Index\Widgets;

use ModulesGarden\tssmodule\App\UI\Admin\Statistics\Index\Graphs\OrdersByStatusGraph;
use ModulesGarden\tssmodule\Components\Widget\Widget;


class OrdersByStatusWidget extends Widget
{
    public function loadHtml(): void
    {
        $this->setTitle($this->translate('title'));
        $this->setIcon('chart-bar');
        $this->addElement(new OrdersByStatusGraph());
    }
}
