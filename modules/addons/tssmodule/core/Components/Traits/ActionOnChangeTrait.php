<?php

namespace ModulesGarden\tssmodule\Core\Components\Traits;

use ModulesGarden\tssmodule\Core\Contracts\Components\ActionInterface;

trait ActionOnChangeTrait
{
    use ActionsTrait;

    public function onChange(ActionInterface $action): self
    {
        $this->addAction('onChange', $action);

        return $this;
    }
}