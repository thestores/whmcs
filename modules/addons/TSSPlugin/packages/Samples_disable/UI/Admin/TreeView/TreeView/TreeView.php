<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\TreeView\TreeView;

use ModulesGarden\TSSPlugin\Components\Container\ContainerColumn;
use ModulesGarden\TSSPlugin\Components\Grid\Grid;

class TreeView extends ContainerColumn
{
    public function loadHtml(): void
    {
        $grid = new Grid();
        $grid->setRows(
            [
                [[new TreeViewWidget(), 4], [new ContentWidget(), 8]]
            ]
        );

        $this->addElement($grid);
    }
}