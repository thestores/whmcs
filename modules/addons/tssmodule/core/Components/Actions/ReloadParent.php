<?php

namespace ModulesGarden\tssmodule\Core\Components\Actions;

use ModulesGarden\tssmodule\Core\Components\AbstractActionInterface;

class ReloadParent extends AbstractActionInterface
{
    public function toArray(): array
    {
        return [
            'action' => 'emit',
            'event'  => 'reload-parent',
        ];
    }
}
