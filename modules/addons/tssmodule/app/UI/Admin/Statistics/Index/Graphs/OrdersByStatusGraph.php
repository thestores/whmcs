<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\Statistics\Index\Graphs;

use ModulesGarden\tssmodule\App\Libs\Helpers;
use ModulesGarden\tssmodule\App\UI\Admin\Reports\Index\DataTables\Shared\RecordsProvider;
use ModulesGarden\tssmodule\Components\Graph\GraphDoughnut;
use ModulesGarden\tssmodule\Components\Graph\Models\DataSet;
use ModulesGarden\tssmodule\Components\Graph\Series\SimpleSeries;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;

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
