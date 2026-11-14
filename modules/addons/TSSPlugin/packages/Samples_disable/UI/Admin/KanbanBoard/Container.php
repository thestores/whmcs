<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\KanbanBoard;

use ModulesGarden\TSSPlugin\Components\BoardColumn\BoardColumn;
use ModulesGarden\TSSPlugin\Components\BoardItem\BoardItem;
use ModulesGarden\TSSPlugin\Components\IconButton\IconButton;
use ModulesGarden\TSSPlugin\Components\Label\LabelDanger;
use ModulesGarden\TSSPlugin\Components\Label\LabelInfo;
use ModulesGarden\TSSPlugin\Components\Label\LabelPrimary;
use ModulesGarden\TSSPlugin\Components\Label\LabelSuccess;
use ModulesGarden\TSSPlugin\Components\Label\LabelWarning;
use ModulesGarden\TSSPlugin\Components\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Core\Components\Enums\BorderColors;
use ModulesGarden\TSSPlugin\Core\Components\Enums\BorderWidths;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxOnLoadInterface;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\ElementsListComponent\Buttons\ButtonDelete;
use ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\KanbanBoard\Providers\BoardProvider;

class Container extends \ModulesGarden\TSSPlugin\Components\Board\Board implements AjaxOnLoadInterface, AdminAreaInterface
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