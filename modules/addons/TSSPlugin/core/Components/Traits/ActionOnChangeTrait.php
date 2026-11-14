<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Traits;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\ActionInterface;

trait ActionOnChangeTrait
{
    use ActionsTrait;

    public function onChange(ActionInterface $action): self
    {
        $this->addAction('onChange', $action);

        return $this;
    }
}