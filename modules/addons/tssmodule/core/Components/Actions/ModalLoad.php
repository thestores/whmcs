<?php

namespace ModulesGarden\tssmodule\Core\Components\Actions;

use ModulesGarden\tssmodule\Components\Modal\Modal;
use ModulesGarden\tssmodule\Core\Components\AbstractActionInterface;
use ModulesGarden\tssmodule\Core\Components\Actions\Traits\WithParamsTrait;
use ModulesGarden\tssmodule\Core\Components\DataBuilder;

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
