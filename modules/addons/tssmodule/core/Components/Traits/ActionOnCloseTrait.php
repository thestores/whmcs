<?php

namespace ModulesGarden\tssmodule\Core\Components\Traits;

use ModulesGarden\tssmodule\Core\Contracts\Components\ActionInterface;

trait ActionOnCloseTrait
{
    use ActionsTrait;

    public function onClose(ActionInterface $action): self
    {
        $this->addAction('onClose', $action);

        return $this;
    }
}