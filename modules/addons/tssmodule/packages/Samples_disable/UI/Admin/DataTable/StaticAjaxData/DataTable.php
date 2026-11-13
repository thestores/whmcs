<?php

namespace ModulesGarden\tssmodule\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\tssmodule\Components\Button\ButtonPrimary;
use ModulesGarden\tssmodule\Components\DataTable\Column;
use ModulesGarden\tssmodule\Core\Components\Actions\ModalOpen;
use ModulesGarden\tssmodule\Core\Components\Actions\PassAjaxData;
use ModulesGarden\tssmodule\Core\Components\Actions\Reload;
use ModulesGarden\tssmodule\Core\Components\Actions\ReloadById;
use ModulesGarden\tssmodule\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\tssmodule\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\tssmodule\Core\Contracts\ResponseInterface;
use ModulesGarden\tssmodule\Core\DataProviders\ArrayDataProvider;
use ModulesGarden\tssmodule\Core\Support\Arr;
use ModulesGarden\tssmodule\Core\Support\Facades\Request;

class DataTable extends \ModulesGarden\tssmodule\Components\DataTable\DataTable implements AjaxComponentInterface, AdminAreaInterface
{
    protected string $cid = 'my-table';

    public function loadHtml(): void
    {
        $this->addColumn((new Column('id')));

        $this->addToBurgerToolbar((new ButtonPrimary())->onClick(new ModalOpen(new Modal())));
    }

    public function loadData(): void
    {
        $data  = Arr::get(Request::get('ajaxData'), 'records', []);
        $toAdd = Arr::get(Request::get('ajaxData'), 'recordToAdd', null);

        if ($toAdd)
        {
            $data[] = [
                'id' => $toAdd
            ];
        }

        $this->setDataProvider((new ArrayDataProvider($data)));
        $this->setAjaxData(['records' => $data, 'recordToAdd' => null]);
    }
}