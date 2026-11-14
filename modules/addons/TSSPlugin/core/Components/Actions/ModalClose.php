<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Actions;

use ModulesGarden\TSSPlugin\Core\Components\AbstractActionInterface;
use ModulesGarden\TSSPlugin\Core\Components\DataBuilder;

class ModalClose extends AbstractActionInterface
{
    protected $modal;

    public function __construct($modal = null)
    {
        $this->modal = $modal;
    }

    public function toArray(): array
    {
        return [
            'action'    => 'modalClose',
            'elementId' => $this->modal ? $this->modal->getId() : null,
        ];
    }
}
