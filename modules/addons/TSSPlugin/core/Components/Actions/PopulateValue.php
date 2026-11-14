<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Actions;

use ModulesGarden\TSSPlugin\Core\Components\AbstractActionInterface;

class PopulateValue extends AbstractActionInterface
{
    protected array $names = [];

    public function __construct(array $names = [])
    {
        $this->names = $names;
    }

    public function addName($name): self
    {
        $this->names[] = $name;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'action' => 'populateValue',
            'names'  => $this->names,
        ];
    }
}
