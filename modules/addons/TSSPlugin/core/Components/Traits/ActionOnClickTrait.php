<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Traits;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\ActionInterface;

trait ActionOnClickTrait
{
    use ActionsTrait;

    public function onClick(ActionInterface $action): self
    {
        $this->addAction('onClick', $action);

        return $this;
    }
}