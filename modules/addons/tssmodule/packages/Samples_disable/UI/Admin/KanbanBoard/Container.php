<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\KanbanBoard;

use ModulesGarden\tssmodule\Components\BoardColumn\BoardColumn;
use ModulesGarden\tssmodule\Components\BoardItem\BoardItem;
use ModulesGarden\tssmodule\Components\IconButton\IconButton;
use ModulesGarden\tssmodule\Components\Label\LabelDanger;
use ModulesGarden\tssmodule\Components\Label\LabelInfo;
use ModulesGarden\tssmodule\Components\Label\LabelPrimary;
use ModulesGarden\tssmodule\Components\Label\LabelSuccess;
use ModulesGarden\tssmodule\Components\Label\LabelWarning;
use ModulesGarden\tssmodule\Components\Toolbar\Toolbar;
use ModulesGarden\tssmodule\Core\Components\Enums\BorderColors;
use ModulesGarden\tssmodule\Core\Components\Enums\BorderWidths;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDelete;
use ModulesGarden\tssmodule\Packages\Samples\UI\Admin\KanbanBoard\Providers\BoardProvider;

class Container extends \ModulesGarden\tssmodule\Components\Board\Board implements AjaxOnLoadInterface, AdminAreaInterface
{
    protected string $provider = BoardProvider::class;

    public function loadData(): void
    {
        for ($i = 0; $i < 3; $i++)
        {
            $boardItem = new BoardItem();

            $boardItem->setTitle('Item ' . $i);
            $boardItem->setSubTitle('Sub title sample ');
            $boardItem->setText("Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
            galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,
            but also the leap into electronic typesetting,
            remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets contai");

            $boardItem->addToToolbar((new IconButton())->setIcon('delete'));
            $boardItem->addToToolbar((new IconButton())->setIcon('pencil'));
            $boardItem->addToToolbar((new IconButton())->setIcon('cog'));

            $boardItem->setBorder(BorderColors::WARNING, BorderWidths::WIDTH_4);
            $boardItem->setBorderTop(BorderColors::SUCCESS, BorderWidths::WIDTH_2);
            $boardItem->setBorderRight(BorderColors::DANGER, BorderWidths::WIDTH_3);
            $boardItem->setBorderLeft("#e942f5", BorderWidths::WIDTH_5);

            $column = new BoardColumn();
            $column->setName('Title ' . $i);
            $column->addElement($boardItem);


            $this->addColumn($column);
        }

        $column = new BoardColumn();
        $column->setName('Empty');

        $this->addColumn($column);
    }
}