<?php

namespace ModulesGarden\tssmodule\Components\ServicePricingWidget;

use ModulesGarden\tssmodule\Components\ServicePricingWidget\Models\DataSet;
use ModulesGarden\tssmodule\Components\Widget\Widget;
use ModulesGarden\tssmodule\Core\Components\Traits\OptionsTrait;

class ServicePricingWidget extends Widget
{
    use OptionsTrait;

    protected DataSet $dataSet;

    public const COMPONENT = 'ServicePricingWidget';

    public function setDataSet(DataSet $dataSet): self
    {
        $this->dataSet = $dataSet;

        return $this;
    }

    public function setEnterPriceCallback(string $callbackBody): self
    {
        $this->setSlot('enterPriceCallback', $callbackBody);

        return $this;
    }

    protected function dataSetSlotBuilder():array
    {
        $dataSet = $this->dataSet ?? new DataSet();

        return $dataSet->toArray();
    }
}