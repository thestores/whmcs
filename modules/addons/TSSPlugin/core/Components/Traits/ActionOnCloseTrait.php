<?php

namespace ModulesGarden\TSSPlugin\Core\Components\Traits;

use ModulesGarden\TSSPlugin\Core\Contracts\Components\ActionInterface;

trait ActionOnCloseTrait
{
    use ActionsTrait;

    public function onClose(ActionInterface $action): self
    {
        $this->addAction('onClose', $action);

        return $this;
    }
}