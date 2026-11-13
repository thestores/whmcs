<?php

namespace ModulesGarden\tssmodule\Core\Components\Actions;

use ModulesGarden\tssmodule\Core\Components\AbstractActionInterface;

class RedirectToPreviousPage extends AbstractActionInterface
{
    public function toArray(): array
    {
        return [
            'action' => 'redirectToPreviousPage',
        ];
    }
}
