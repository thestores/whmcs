<?php

namespace ModulesGarden\tssmodule\Components\Graph\Source;

use ModulesGarden\tssmodule\Components\Graph\Models\DataSet;
use ModulesGarden\tssmodule\Components\Graph\Series\ExtendedSeries;

abstract class GraphExtendedSeries extends BaseGraph
{
    /**
     * @deprecated - use addSeries instead
     */
    public function addDataSet(DataSet $dataSet)
    {
        $series = new ExtendedSeries($dataSet->getLabel(), $dataSet->getData());

        if ($color = $dataSet->toArray()['borderColor'])
        {
            $series->setColor($color);
        }

        $this->addSeries($series);

        return $this;
    }

    public function addSeries(ExtendedSeries $series):self
    {
        $this->options->addSeries($series);

        return $this;
    }
}