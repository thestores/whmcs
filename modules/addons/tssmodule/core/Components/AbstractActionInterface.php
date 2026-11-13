<?php

namespace ModulesGarden\tssmodule\Core\Components;

use JsonSerializable;

class AbstractActionInterface implements JsonSerializable, \ModulesGarden\tssmodule\Core\Contracts\Components\ActionInterface
{
    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    public function toArray(): array
    {
        return [];
    }
}
