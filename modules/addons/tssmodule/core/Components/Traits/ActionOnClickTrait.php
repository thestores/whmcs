<?php

namespace ModulesGarden\tssmodule\Core\Components\Traits;

use ModulesGarden\tssmodule\Core\Contracts\Components\ActionInterface;

trait ActionOnClickTrait
{
    use ActionsTrait;

    public function onClick(ActionInterface $action): self
    {
        $this->addAction('onClick', $action);

        return $this;
    }
}