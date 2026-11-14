<?php

namespace ModulesGarden\TSSPlugin\Components\Graph\Source;

use ModulesGarden\TSSPlugin\Components\Form\AbstractForm;
use ModulesGarden\TSSPlugin\Components\Graph\Models\DataSet;
use ModulesGarden\TSSPlugin\Components\Graph\Models\Options;
use ModulesGarden\TSSPlugin\Components\Graph\Series\ExtendedSeries;
use ModulesGarden\TSSPlugin\Components\Graph\Toolbar\Toolbar;
use ModulesGarden\TSSPlugin\Core\Components\AbstractComponent;
use ModulesGarden\TSSPlugin\Core\Components\Traits\AjaxTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\ComponentsContainerTrait;
use ModulesGarden\TSSPlugin\Core\Components\Traits\TitleTrait;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxOnLoadInterface;

abstract class BaseGraph extends AbstractComponent implements AjaxOnLoadInterface
{
    use AjaxTrait;
    use TitleTrait;
    use ComponentsContainerTrait;

    public const COMPONENT = 'Graph';

    protected Options $options;

    public function __construct()
    {
        parent::__construct();

        $this->options = new Options();
    }

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

    public function loadHtml(): void
    {
        $this->buildToolbar();
    }

    /**
     * Override to create custom toolbar
     * @return void
     */
    protected function buildToolbar()
    {
        if ($form = $this->defineEditOption())
        {
            $toolbar = new Toolbar();
            $toolbar->setForm($form);

            $this->addElement($toolbar);
        }
    }

    /**
     * Override to enable edit option for the graphs
     * @return AbstractForm|null
     */
    protected function defineEditOption(): ?AbstractForm
    {
        return null;
    }

    protected function optionsSlotBuilderJson()
    {
        return $this->options->toArray();
    }

    protected function ajaxOnLoadSlotBuilder(): ?bool
    {
        return empty($this->options->series);
    }

    /**
     * @param $labels
     * @return $this
     */
    public function setLabels(array $labels = [])
    {
        $this->options->xAxis->categories = $labels;

        return $this;
    }

    public function setOptions(Options $options)
    {
        $this->options = $options;
    }

    public function setType(string $type):self
    {
        $this->options->chart->type = $type;

        return $this;
    }
}
