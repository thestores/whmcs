<?php

namespace ModulesGarden\TSSPlugin\Packages\Samples\UI\Admin\DataTable\StaticAjaxData;

use ModulesGarden\TSSPlugin\Components\Button\ButtonPrimary;
use ModulesGarden\TSSPlugin\Components\DataTable\Column;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ModalOpen;
use ModulesGarden\TSSPlugin\Core\Components\Actions\PassAjaxData;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Reload;
use ModulesGarden\TSSPlugin\Core\Components\Actions\ReloadById;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AdminAreaInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\Components\AjaxComponentInterface;
use ModulesGarden\TSSPlugin\Core\Contracts\ResponseInterface;
use ModulesGarden\TSSPlugin\Core\DataProviders\ArrayDataProvider;
use ModulesGarden\TSSPlugin\Core\Support\Arr;
use ModulesGarden\TSSPlugin\Core\Support\Facades\Request;

class DataTable extends \ModulesGarden\TSSPlugin\Components\DataTable\DataTable implements AjaxComponentInterface, AdminAreaInterface
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