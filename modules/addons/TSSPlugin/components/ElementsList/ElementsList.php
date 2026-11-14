<?php

namespace ModulesGarden\TSSPlugin\Components\ElementsList;

use ModulesGarden\TSSPlugin\Components\DataTable\DataTable;
use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;

abstract class ElementsList extends DataTable
{
    public const COMPONENT = 'ElementsList';

    abstract protected function buildElement($record):AbstractComponent;

    protected function parseDataSetRecords(): void
    {
        foreach ($this->dataSet->getRecords() as $record)
        {
            $this->addElement($this->buildElement($record));
        }
    }
}