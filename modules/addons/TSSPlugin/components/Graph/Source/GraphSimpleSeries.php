<?php

namespace ModulesGarden\TSSPlugin\Components\Graph\Source;

use ModulesGarden\TSSPlugin\Components\Graph\Models\DataSet;
use ModulesGarden\TSSPlugin\Components\Graph\Options\LabelsOptions;
use ModulesGarden\TSSPlugin\Components\Graph\Series\SimpleSeries;

abstract class GraphSimpleSeries extends BaseGraph
{
    public function addDataSet(DataSet $dataSet)
    {
        foreach ($dataSet->getData() as $element)
        {
            $this->addSeries(new SimpleSeries($element));
        }

        return $this;
    }

    public function addSeries(SimpleSeries $series):self
    {
        $this->options->addSeries($series);

        return $this;
    }

    public function setLabels(array $labels = []):self
    {
        $this->options->labels = new LabelsOptions($labels);

        return $this;
    }
}