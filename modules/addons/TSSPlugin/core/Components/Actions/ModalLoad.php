<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Actions;

use ModulesGarden\TSSPlugin\Components\Modal\Modal;
use ModulesGarden\TSSPlugin\Core\Components\AbstractActionInterface;
use ModulesGarden\TSSPlugin\Core\Components\Actions\Traits\WithParamsTrait;
use ModulesGarden\TSSPlugin\Core\Components\DataBuilder;

class ModalLoad extends AbstractActionInterface
{
    use WithParamsTrait;

    protected Modal $modal;

    public function __construct(Modal $modal)
    {
        $this->modal = $modal;
    }

    public function toArray(): array
    {
        return [
            'action'       => 'modalLoad',
            'modal'        => (new DataBuilder($this->modal))->toArray(),
            'params'       => $this->ajaxData,
        ];
    }
}
