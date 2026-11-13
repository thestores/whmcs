<?php

namespace ModulesGarden\tssmodule\Components\Graph\Series;

use ModulesGarden\tssmodule\Components\Graph\Source\SeriesInterface;

class SimpleSeries implements SeriesInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getSeries()
    {
        return $this->data;
    }
}