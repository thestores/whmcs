<?php

namespace ModulesGarden\tssmodule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue;

use ModulesGarden\tssmodule\App\Libs\AutoInstallQueue;
use ModulesGarden\tssmodule\App\UI\Admin\AutomationQueue\Index\DataTables\Queue\Buttons\ResetTaskButton;
use ModulesGarden\tssmodule\Components\DataTable\Column;
use ModulesGarden\tssmodule\Components\Label\Label;
use ModulesGarden\tssmodule\Components\Label\LabelDanger;
use ModulesGarden\tssmodule\Components\Label\LabelInfo;
use ModulesGarden\tssmodule\Components\Label\LabelSecondary;
use ModulesGarden\tssmodule\Components\Label\LabelSuccess;
use ModulesGarden\tssmodule\Components\Label\LabelWarning;
use ModulesGarden\tssmodule\Components\VisibilityWrapper\VisibilityWrapper;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\DataProviders\AbstractRecordsListDataProvider;
use ModulesGarden\tssmodule\Core\DataProviders\QueryDataProvider;
use ModulesGarden\tssmodule\Core\WHMCS\URL;
use WHMCS\Database\Capsule;

class DataTable extends \ModulesGarden\tssmodule\Components\DataTable\DataTable implements AdminAreaInterface, AjaxComponentInterface
{
    public function loadHtml(): void
    {
        $this->setId('automationQueueDataTable');

        $this->addColumn((new Column('id'))
                             ->setTitle($this->translate('id'))
                             ->setSortable()
                             ->setSearchable(true, Column::TYPE_INT))
             ->addColumn((new Column('service_id'))
                             ->setTitle($this->translate('service'))
                             ->setSortable()
                             ->setSearchable(true, Column::TYPE_INT))
             ->addColumn((new Column('domain'))
                             ->setTitle($this->translate('domain'))
                             ->setSortable()
                             ->setSearchable(true))
             ->addColumn((new Column('type'))
                             ->setTitle($this->translate('type'))
                             ->setSortable()
                             ->setSearchable(true))
             ->addColumn((new Column('status'))
                             ->setTitle($this->translate('status'))
                             ->setSortable()
                             ->setSearchable(true))
             ->addColumn((new Column('attempts'))
                             ->setTitle($this->translate('attempts'))
                             ->setSortable())
             ->addColumn((new Column('error_message'))
                             ->setTitle($this->translate('message'))
                             ->setSearchable(true))
             ->addColumn((new Column('updated_at'))
                             ->setTitle($this->translate('updated'))
                             ->setSortable());

        $this->setRecordsPerPageOptions([10, 25, 50]);

        $resetButton = new VisibilityWrapper(new ResetTaskButton());
        $resetButton->hideWhen('canReset', '0');
        $this->addActionButton($resetButton);
    }

    public function loadData(): void
    {
        AutoInstallQueue::createTables();

        $dataProv = new QueryDataProvider(
            Capsule::table(AutoInstallQueue::queueTable())->select(
                'id', 'client_id', 'service_id', 'domain', 'type', 'status', 'attempts', 'error_message', 'updated_at',
                Capsule::raw("IF(status IN ('pending', 'processing'), 0, 1) as canReset")
            )
        );

        $dataProv->setDefaultSorting('id', AbstractRecordsListDataProvider::SORT_DESC);
        $this->setDataProvider($dataProv);
    }

    protected function parseDataSetRecords(): void
    {
        $this->dataSet->setFieldModifier('service_id', function($fieldName, $row, $fieldValue) {
            $url = URL\Admin::clientServices((int)$row['client_id'], ['productselect' => (int)$fieldValue]);

            return sprintf("<a href='%s'>#%d</a>", $url, (int)$fieldValue);
        });

        $this->dataSet->setFieldModifier('status', function($fieldName, $row, $fieldValue) {
            $labels = [
                'pending'    => LabelInfo::class,
                'processing' => LabelWarning::class,
                'done'       => LabelSuccess::class,
                'error'      => LabelDanger::class,
                'cancelled'  => LabelSecondary::class,
            ];
            $class = isset($labels[$fieldValue]) ? $labels[$fieldValue] : Label::class;

            $label = new $class();
            $label->setText(ucfirst((string)$fieldValue));

            return $label;
        });

        $this->dataSet->setFieldModifier('error_message', function($fieldName, $row, $fieldValue) {
            return htmlspecialchars((string)$fieldValue);
        });

        $this->dataSet->modifyRecords();
    }
}
