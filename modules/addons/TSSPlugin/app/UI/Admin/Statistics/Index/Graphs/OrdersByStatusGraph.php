<?php

namespace ModulesGarden\TSSPlugin\App\UI\Admin\Statistics\Index\Graphs;

use ModulesGarden\TSSPlugin\App\Libs\Helpers;
use ModulesGarden\TSSPlugin\App\UI\Admin\Reports\Index\DataTables\Shared\RecordsProvider;
use ModulesGarden\TSSPlugin\Components\Graph\GraphDoughnut;
use ModulesGarden\TSSPlugin\Components\Graph\Models\DataSet;
use ModulesGarden\TSSPlugin\Components\Graph\Series\SimpleSeries;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;

class OrdersByStatusGraph extends GraphDoughnut implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadData(): void
    {
        $this->options->chart->height = "380px";
        $records = [];
        foreach((new RecordsProvider())->getRecords([]) as $record)
        {
            $records[$record['serviceId']] = $record;
        }

        $counts = [];
        foreach($records as $record)
        {
            $status          = $record['status'] ?: 'Unknown';
            $counts[$status] = ($counts[$status] ?? 0) + 1;
        }
        arsort($counts);

        $this->setLabels(array_keys($counts));
        foreach($counts as $count)
        {
            $this->addSeries(new SimpleSeries($count));
        }
    }
}
