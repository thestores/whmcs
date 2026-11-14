<?php

namespace ModulesGarden\TSSPlugin\Components\ServicePricingWidget;

use ModulesGarden\TSSPlugin\Components\ServicePricingWidget\Models\DataSet;
use ModulesGarden\TSSPlugin\Components\Widget\Widget;
use ModulesGarden\TSSPlugin\Core\Components\Traits\OptionsTrait;

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