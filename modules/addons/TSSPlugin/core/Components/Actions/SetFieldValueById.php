<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Actions;

use ModulesGarden\TSSPlugin\Core\Components\AbstractActionInterface;

class SetFieldValueById extends AbstractActionInterface
{
    protected string $id;

    protected string $value;

    public function __construct(string $id, string $value)
    {
        $this->id  = $id;
        $this->value = $value;
    }

    public function toArray(): array
    {
        return [
            'action' => 'setFieldValueById',
            'id' => $this->id,
            'value'  => $this->value
        ];
    }
}
