<?php

namespace ModulesGarden\tssmodule\Components\ElementsList;

use ModulesGarden\tssmodule\Components\DataTable\DataTable;
use ModulesGarden\tssmodule\Core\Components\AbstractComponent;

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