<?php

namespace ModulesGarden\TSSPlugin\Components\TableSimple;

use ModulesGarden\TSSPlugin\Components\TableSimple\Record\Record;
use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\AjaxTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\CssContainerTrait;

class TableSimple extends AbstractComponent
{
    use AjaxTrait;
    use CssContainerTrait;

    public const COMPONENT = 'TableSimple';

    public function addColumn(Column\Column $column): self
    {
        $this->pushToSlot('columns', $column->toString());

        return $this;
    }

    public function addRecord(Record $record): self
    {
        $this->pushToSlot('records', $record->toArray());

        return $this;
    }

    public function setColumns(array $arrayOfColumns): self
    {
        foreach ($arrayOfColumns as $column)
        {
            $this->addColumn($column);
        }

        return $this;
    }

    public function setRecords(array $arrayOfRecords): self
    {
        $this->setSlot('records', $arrayOfRecords);

        return $this;
    }

    public function setTextCentered(bool $textCentered = true): self
    {
        $this->setSlot('textCentered', $textCentered);

        return $this;
    }
}
